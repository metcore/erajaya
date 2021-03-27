<x-app-layout>
  <!--   <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> -->
    <div class="container">

        <a  class="btn btn-success float-right" href="{{ route('editUser', ['id' => $model->id]) }}">
            Edit User
        </a>
        <br>
        <br>
        {!! Form::open(array('url' => route('storeUser'), 'class' => 'ajax','method'=>'post')) !!}
            
            <div class="row">
                <div class="col-sm-6">
                    <table class="table">
                        <tr>
                            <th>
                                
                                {!! Form::label('name',"Name", array('class'=>'control-label required')) !!}
                            </th>
                            <td>
                                {{$model->name}}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                    
                                {!! Form::label('email', "Email", array('class'=>' control-label')) !!}
                            </th>
                            <td>
                                {{$model->email}}
                            </td>
                        </tr>
                    </table>
                  
                </div>

                <div class="col-sm-6">
                   <?php
                    $menus =  Config::get('roles'); 
                    ?>
                   
                    <table class="table">
                        <tr>
                            <th>Route</th>
                            <th>Index</th>
                            <th>Create</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach($menus as $key => $menu)
                            @php 
                                $roles = unserialize($model->roles); 
                                $valueIndex = $roles ? (array_key_exists($menu['label'], $roles) ? (array_key_exists("index",$roles[$menu['label']]) ? true : false) : false) :false;
                                $valueCreate = $roles ? (array_key_exists($menu['label'], $roles) ? (array_key_exists("create",$roles[$menu['label']]) ? true : false) : false) :false;
                                $valueUpdate = $roles ? (array_key_exists($menu['label'], $roles) ? (array_key_exists("edit",$roles[$menu['label']]) ? true : false) : false) :false;
                                $valueDelete = $roles ? (array_key_exists($menu['label'], $roles) ? (array_key_exists("delete",$roles[$menu['label']]) ? true : false) : false) :false;
                            @endphp   
                            <tr>
                                <td>
                                {!! Form::label('quantity_available', $menu['label'], array('class'=>' control-label'), ) !!}
                                </td>
                                <td>
                                    {!!Form::checkbox("roles[".$menu['label']."]".'[index]', '1', $valueIndex, ['disabled' => 'disabled'] ) !!}
                                </td>
                                <td>
                                    {!!Form::checkbox("roles[".$menu['label']."]".'[create]', '1', $valueCreate , ['disabled' => 'disabled']) !!}
                                </td>
                                <td>
                                    {!!Form::checkbox("roles[".$menu['label']."]".'[edit]', '1', $valueUpdate, ['disabled' => 'disabled']) !!}
                                </td>
                                <td>
                                    {!!Form::checkbox("roles[".$menu['label']."]".'[delete]', '1', $valueDelete, ['disabled' => 'disabled']) !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    
                </div>
            </div>
       {!! Form::close() !!}
   </div>
        <script type="text/javascript">
            $(document).ready(function() {
              $('.btnNext').click(function() {
                $('.nav-tabs .active').parent().next('li').find('a').trigger('click');
              });

              $('.btnPrevious').click(function() {
                $('.nav-tabs .active').parent().prev('li').find('a').trigger('click');
              });
            });

        </script>
</x-app-layout>
