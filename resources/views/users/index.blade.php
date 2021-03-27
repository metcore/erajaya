<x-app-layout>
  <!--   <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> -->
    <div class="container">
        <a href="{{ route('createUser') }}"  class="btn btn-success float-right">
            Create User
        </a>
        <br>
        <br>
        <div class="row">
            <table class="table">
                <thead>
                    <th scope="col">No</th>
                    <th scope="col"><a  class="btn btn-link sort-user"  sort-value="name" sort-type="asc"> Name</a></th>
                    <th scope="col"><a  class="btn btn-link sort-user"  sort-value="email" sort-type="asc"> email</a></th>
                    <th scope="col">Action</th>
                </thead>
                <tbody>
                    <tr class="filter-user">
                        <td>
                            
                        </td>
                        <td>
                            <input type="text" name="UserSearch[name]" class="form-control" value="">
                        </td>
                        <td>
                            <input type="text" name="UserSearch[email]" class="form-control">
                        </td>
                    </tr>
                @foreach($users as $key => $user)
                <tr>
                    <td>
                        {{ $users->firstItem() + $key }}
                    </td>
                    <td>
                        {{$user->name}}
                    </td>
                    <td>
                        {{$user->email}}
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('showUser', ['id' => $user->id]) }}">View</a>
                                <a class="dropdown-item" href="{{ route('editUser', ['id' => $user->id]) }}">Edit</a>
                                <a class="dropdown-item" href="{{ route('destroyUser', ['id' => $user->id]) }}">Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            {{$users->links()}}
        </div>
    </div>
</x-app-layout>
<script type="text/javascript">
    $(document).ready(function(){
        $(".filter-user").on('change', function(){
            $(".filter-user").find('input').each(function () { 
                var paramSearchStart = "?";
                var paramSearch ="";
                $(".filter-user").find('input').each(function () { 
                    paramSearch += $(this).attr("name") +"="+$(this).val()+"&";
                });
                 window.location.href = "{{route('users')}}"+paramSearchStart+paramSearch;
            });
        })

        $(".sort-user").click(function(){

            routeSort = "sort="+$(this).attr("sort-value")+"&";
            routeSortType = "sort-type="+$(this).attr("sort-type");
            $(".filter-user").find('input').each(function () { 
                var paramSearchStart = "?";
                var paramSearch ="";
                $(".filter-user").find('input').each(function () { 
                    paramSearch += $(this).attr("name") +"="+$(this).val()+"&";
                });
                window.location.href = "{{route('users')}}"+paramSearchStart+paramSearch+routeSort+routeSortType;
            });

        })

        $(".filter-user").find('input').each(function () { 
            var queryString = window.location.search;
            var urlParams = new URLSearchParams(queryString);
            var parameter = urlParams.getAll($(this).attr("name"))
            $(this).val(parameter)
        });

        var queryString = window.location.search;
        var urlParams = new URLSearchParams(queryString);
        var sortValueParameter = urlParams.getAll("sort-type");
        var sortParameter = urlParams.getAll("sort");
        if (sortValueParameter == "asc") {
            console.log("D")
            $("[sort-value='"+sortParameter+"']").attr("sort-type",'desc')
        }
        else{
            $("[sort-value='"+sortParameter+"']").attr("sort-type",'asc')
        }
    })
</script>