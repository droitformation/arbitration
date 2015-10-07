<?php namespace App\Saa\Module\Repo;

use App\Saa\Module\Repo\ModuleInterface;
use App\Saa\Module\Entities\Module as M;

class ModuleEloquent implements ModuleInterface{

    protected $module;

    public function __construct(M $module)
    {
        $this->module = $module;
    }

    public function getAll(){

        return $this->module->all();
    }

    public function find($id){

        return $this->module->find($id);
    }

    public function create(array $data){

        $module = $this->module->create(array(
            'module_course'     => $data['module_course'],
            'module_number'     => $data['module_number'],
            'module_title'      => $data['module_title'],
            'module_date_start' => $data['module_date_start'],
            'module_date_stop'  => $data['module_date_stop'],
            'module_location'   => $data['module_location'],
            'module_lecturers'  => $data['module_lecturers'],
            'module_guest'      => $data['module_guest'],
            'module_text'       => $data['module_text'],
            'module_status'     => $data['module_status']
        ));

        if( ! $module )
        {
            return false;
        }

        return $module;

    }

    public function update(array $data){

        $module = $this->module->findOrFail($data['id']);

        if( ! $module )
        {
            return false;
        }

        $module->fill($data);

        $module->save();

        return $module;
    }

    public function delete($id){

        $module = $this->module->find($id);

        return $module->delete($id);

    }

}
