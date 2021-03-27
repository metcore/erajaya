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
        {!! Form::open(array('url' => route('storeUser'), 'class' => 'ajax','method'=>'post')) !!}
      
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('name',"Name", array('class'=>'control-label required')) !!}
                        {!!  Form::text('name', old('name'),
                                    array(
                                    'class'=>'form-control',
                                    'placeholder'=>"Put full name"
                                    ))  !!}


                    </div>
                     <div class="form-group">
                        {!! Form::label('email', "Email", array('class'=>' control-label')) !!}
                        {!!  Form::text('email', old('email'),
                            array(
                            'class'=>'form-control',
                            'placeholder'=>"Insert Email"
                            )
                            )  !!}
                    </div>
                    <div class="form-group">

                        {!! Form::label('password', "Password", array('class'=>' control-label')) !!}
                        {!! Form::password('password', ['class'=>'form-control','placeholder'=>"Insert Password"]);!!}
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
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        @foreach($menus as $key => $menu)
                        <tr>
                            <td>
                            {!! Form::label('quantity_available', $menu['label'], array('class'=>' control-label')) !!}
                            </td>
                            <td>
                                {!!Form::checkbox("roles[".$menu['label']."]".'[index]', '1') !!}
                            </td>
                            <td>
                                {!!Form::checkbox("roles[".$menu['label']."]".'[create]', '1') !!}
                            </td>
                            <td>
                                {!!Form::checkbox("roles[".$menu['label']."]".'[edit]', '1') !!}
                            </td>
                            <td>
                                {!!Form::checkbox("roles[".$menu['label']."]".'[delete]', '1') !!}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    
                </div>
            </div>
            <button type="submit" class="btn btn-info  float-right">Submit </button> 

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
