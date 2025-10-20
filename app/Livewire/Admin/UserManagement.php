<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\role;
use App\Models\user_role;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Locked;
use Illuminate\Support\Facades\Hash;

class UserManagement extends Component
{

    public $hasMore,$limitPerPage,$count,$Search, $SearchEmployee;

    public $name;

    public $user_name,$updateUser, $password, $confirm_password,$UserisActive,$TempMultipleRole,$SelectedRole;

    #[Locked]
    public $select_user_id;

    public function mount() {
        $this->count = 0;
        $this->limitPerPage = 10;
        $this->Search = null;
        $this->select_user_id = null;
        $this->SelectedRole = null;
        $this->TempMultipleRole = null;
        $this->UserList();
        $this->resetUserForm();

    }


    public function resetUserForm() {
        $this->user_name = null;
        $this->password = null;
        $this->name = null;
        $this->confirm_password = null;
        $this->SearchEmployee = null;
        $this->updateUser = false;
        $this->resetErrorBag();
    }



    #[On('reset-user-list')]
    public function UserList() {
        $this->count = User::where('user_name', 'like',  '%'.$this->Search.'%')->where('id','!=', 1)->orwhere('name', 'like',  '%'.$this->Search.'%')->where('id','!=', 1)->count();
        if($this->count > $this->limitPerPage) {
            if($this->count > 10) {
                $this->hasMore = true;
            }
            else {
                $this->limitPerPage = $this->count;
            }
        }
        else {
            $this->hasMore = false;
            $this->limitPerPage = $this->count;
        }
    }



    #[On('load-more')]
    public function loadMore()
    {
        if($this->hasMore == true) {
            $this->limitPerPage = $this->limitPerPage + 10;
            $this->UserList();
        }
    }

    public function updatedSearch() {
        $this->limitPerPage = 10;
        $this->UserList();

    }

    public function editUser($id) {
      
        $User = User::findorfail($id);

        $this->updateUser = true;
        $this->user_name = $User->user_name;
        $this->name = $User->name;
        $this->select_user_id = $User->id;
        $this->dispatch('showCreateUserModal');
    }

    public function UserUpdate() {
      
        if($this->updateUser == true) {
            $User = User::where('id',$this->select_user_id)->get()->first();

            $this->validate([
                'name' => 'required|min:3|unique:users,name,'. $User->id,

            ], [
                'required' => 'This field is required.',
            ]);

            if(!is_null($this->password))
            {
                $this->validate([

                    'password' => 'required|min:8|max:25',
                    'confirm_password' => 'same:password'
                ], [
                    'password.required' => 'Enter User password',
                    'confirm_password.required' => 'Confirm User password',
                    'confirm_password.same' => 'The confirm password must be the same to the password',
                ]);

                $User['password']=  Hash::make($this->password);

            }
            $User['name']=  $this->name;
            $User['municipality_id']=  $this->municipality_id;


            $Success = $User->save();
            if($Success) {
                $this->dispatch('closeCreateUserModal');
                $this->resetUserForm();
                $this->showToastr('User updated Successfully','success');
                $this->dispatch('reset-user-list');

            }
            else {
                $this->showToastr('Something went wrong. Please contact System Administrator','error');
            }
        }
    }






    public function addUser() {
      
        if($this->updateUser == false) {
            $this->validate([
                'name' => 'required|min:3|unique:users,name',
                'user_name' => 'required|alpha_dash|max:30|unique:users,user_name',
                'password' => 'required|min:8|max:25',
                'confirm_password' => 'same:password'
            ], [
                'required' => 'This field is required.',
                'password.required' => 'Enter User password',
                'confirm_password.required' => 'Confirm User password',
                'confirm_password.same' => 'The confirm password must be the same to the password',
            ]);

            $User = new User();
            $User['user_name'] = $this->user_name;
            $User['password'] =  Hash::make($this->password);
            $User['name'] = $this->name;
            $User['is_enable'] = true;
            $success = $User->save();

            if ($success)
            {

                $this->showToastr('User created Successfully','success');
                $this->dispatch('closeCreateUserModal');
                $this->dispatch('reset-user-list');
                $this->resetUserForm();

            }
            else
            {

                $this->showToastr('Something went wrong. Please contact System Administrator','error');
            }
        }
    }


    public function activateUser($id) {
       
        $this->UserisActive = true;
        $User = User::findorfail($id);
        $this->select_user_id = $User->id;
        $this->dispatch('showActivateUserModal');
    }

    public function deactivateUser($id) {
        $this->UserisActive = false;
        $User = User::findorfail($id);
        $this->select_user_id = $User->id;
        $this->dispatch('showActivateUserModal');
    }

    public function updateActivateUser() {
      
        $User = User::where('id', $this->select_user_id)->get()->first();

        if($this->UserisActive == true) {
            $User->is_enable = true;
            $Success = $User->save();
            if($Success) {
                $this->showToastr('User activated Successfully','success');
                $this->dispatch('closeActivateUserModal');
                $this->dispatch('reset-user-list');
            }
            else {
                $this->showToastr('Something went wrong. Please contact System Administrator','error');
            }
        }
        else {
            $User->is_enable = false;
            $Success = $User->save();
            if($Success) {
                $this->showToastr('User deactivated Successfully','success');
                $this->dispatch('closeActivateUserModal');
                $this->dispatch('reset-user-list');
            }
            else {
                $this->showToastr('Something went wrong. Please contact System Administrator','error');
            }
        }
    }





    public function editRole($id) {
      
        $SelectedUser = User::findorfail($id);

        $this->select_user_id = $SelectedUser->id;
        $this->TempMultipleRole = [];
        $User = User::where('id', $SelectedUser->id)->get()->first();
        if($User) {
            if($User->Roles->count() != 0) {
                 foreach($User->Roles as $Role) {
                     $this->TempMultipleRole[] = array($Role->Role->id, $Role->Role->role_name);
                 }
             }
             $this->dispatch('showCreateRoleModal');
        }
    }



    public function updateRole() {
        
        $User = User::where('id', $this->select_user_id)->first();
        $HasRecord = user_role::where('user_id', $this->select_user_id)->get();
        if($HasRecord) {
            $Success = user_role::where('user_id', $this->select_user_id)->delete();
            if($Success) {
                $this->dispatch('closeCreateRoleModal');
                $this->showToastr('User Role updated Successfully','success');
            }
        }

        foreach($this->TempMultipleRole as  $Role ) {
            $UserRole = new user_role();
            $UserRole['user_id'] = $this->select_user_id;
            $UserRole['role_id'] = $Role[0];
            $Success = $UserRole->save();
            if($Success) {

                $this->dispatch('closeCreateRoleModal');
                $this->showToastr('User Role updated Successfully','success');
            }
            else {
                $this->showToastr('Something went wrong. Please contact System Administrator','error');
            }
        }
        $this->select_user_id ='';
        $this->SelectedRole = null;
    }

    public function removefromRole($id) {
      
        foreach($this->TempMultipleRole as $Key => $Role ) {
            if($Role[0] == $id) {
                unset($this->TempMultipleRole[$Key]);
            }
        }
    }

    public function addtoMultipleRole() {

      
        $RoleInfo = Role::where('id', $this->SelectedRole)->get()->first();
        if($RoleInfo) {
            $status = false;
            if(!is_null($this->TempMultipleRole)) {
                foreach($this->TempMultipleRole as $Role) {
                    if($Role[0] == $this->SelectedRole) {
                        $status = true;
                    }
                }
            }

            if($status == false) {
                $this->TempMultipleRole[] = array($this->SelectedRole, $RoleInfo->role_name);
            }

        }
    }




    public function showToastr($message, $type) {
        return $this->dispatch('showToastr',   message: $message, type: $type);
    }
    public function render()
    {
        return view('livewire.admin.user-management',[
            'Roles' => role::orderby('role_name','asc')->get(),
            'Users' => User::where('user_name', 'like',  '%'.$this->Search.'%')->where('id','!=', 1)->orwhere('name', 'like',  '%'.$this->Search.'%')->where('id','!=', 1)->orderby('updated_at','desc')->get()->take($this->limitPerPage),
           
        ]);
    
    }
}
