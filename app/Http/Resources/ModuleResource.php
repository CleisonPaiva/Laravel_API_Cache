<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ModuleResource extends JsonResource
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

        return[
            'uuid'=>$this->uuid,
            'name'=>$this->name,
            'date'=>Carbon::make($this->created_at)->format('d-m-Y'),
            //Retorna a relação de Modulos e Aulas - Evitar esse tipo  / Faz muitas querys
            'lessons' => LessonResource::collection($this->lessons)
        ];
    }

}
