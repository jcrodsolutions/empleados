<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmpleadosResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'id'=>$this->id,
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'cedula' => $this->cedula,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'email' => $this->email,
            'nacionalidad' => $this->nacionalidades->nacionalidad,
            'tipo_de_contrato' => $this->tiposdecontrato->tipo,
            'fecha_contrato' => $this->fecha_contrato,
            'fecha_terminacion' => $this->fecha_terminacion,
            'departamento' => $this->departamentos->departamento,
        ];
    }
}
