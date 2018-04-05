<?php

namespace SisArchivos;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
	const PAGINATE = true;
    //public $filters = [];
    public  function search(array $data = array(), $paginate = true) 
    {
      /*
       * Tomamos solo los campos que están  
       * definidos en el array filters
       */

        $data = array_only($data, $this->filters);

        /*
         *  Filtramos los datos para no tomar en 
         *  cuenta los que están vacios
         */ 

        $data = array_filter($data, 'strlen');  

        $q = $this->model->select();

        foreach ($data as $field => $value) {
            
            if (isset ($data[$field]))
            {
                /*
                 * Creo un método personalizado por si existe
                 * algún campo en el filtro que no se corresponde
                 * a un campo de la tabla en la BD
                 */

                $filterMethod = 'filterBy' . studly_case($field);

                if (method_exists(get_called_class(), $filterMethod))
                {
                    /*
                     * Si el método existe, llamamos al método personalizado
                     */

                        $this->$filterMethod($q, $value);
                }
                else
                {
                   $q->where($field, 'LIKE', "%$data[$field]%");
                }    
            }
        }

       return $paginate ?
            $q->paginate()->appends($data)
            : $q->get();
    }
}
