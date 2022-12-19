<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;

use Livewire\Component;

use Spatie\Permission\Models\Role;

class AssignRoleUser extends Component
{
    public  $user, $roles, $value = 7, $rol;


    protected $rules  = [

     /*   'item1' => 'required',
        'item2' => 'required',
        'item3' => 'required',
        'item4' => 'required',
        'item5' => 'required',
        'status' => 'required'
*/
        ];


    public function assignRole(User $user, $value){

        $user->syncRoles($value);

        $this->emit(event: 'refreshAssignRole');

    }
    Protected $validationAttributes = [
        /*
        'item1' => 'comprobación de preparación de OF, Registro de limpieza, Especificación de Producto e Imputación',
        'item2' => 'verificación despeje de linea del producto anterior',
        'item3' => 'verificación orden y limpieza en máquina y sala',
        'item4' => 'informar y aplicar la seguridad laboral en la producción al grupo de trabajo',
        'item5' => 'verificar protocolo de trabajo',
        'observation' => 'observación',
        'status' => 'confirmar inicio',
   */
    ];

    public function mount(){
        $this->roles = Role::all();

   }



    public function render()
    {
        return view('livewire.admin.user.assign-role-user');
    }
}
