<x-app-layout>
  <!--   <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> -->
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {!! Form::open(array('url' => route('updateUser',['id'=>$model->id]), 'class' => 'ajax','method'=>'post')) !!}
      
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('name',"Name", array('class'=>'control-label required')) !!}
                        {!!  
                            Form::text('name', old('name') ? old('name') : $model->name , [
                                'class'=>'form-control',
                                'placeholder'=>"Insert full name"
                            ])
                        !!}


                    </div>
                     <div class="form-group">
                        {!! Form::label('email', "Email", array('class'=>' control-label')) !!}
                        {!!  
                            Form::text('email',  old('email') ? old('email') : $model->email ,[
                                'class'=>'form-control',
                                'placeholder'=>"Insert Email"
                            ])  
                        !!}
                    </div>
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
                                    {!!Form::checkbox("roles[".$menu['label']."]".'[index]', '1', $valueIndex ) !!}
                                </td>
                                <td>
                                    {!!Form::checkbox("roles[".$menu['label']."]".'[create]', '1', $valueCreate ) !!}
                                </td>
                                <td>
                                    {!!Form::checkbox("roles[".$menu['label']."]".'[edit]', '1', $valueUpdate) !!}
                                </td>
                                <td>
                                    {!!Form::checkbox("roles[".$menu['label']."]".'[delete]', '1', $valueDelete) !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    
                </div>
            </div><div class=""></div>
            <div class="float-right">
                <button type="submit" class="btn btn-info  clearfix">Submit </button> 
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
