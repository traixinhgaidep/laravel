@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
            <div><a id="get" class="btn btn-primary">Get Aticle</a></div>
        
        <table id="article" class="table table-bordered table-striped">
            <thead>
                <th>
                     Title
                </th>
                <th>
                     Noi dung
                </th>
            </thead>
            <tbody id="getarticle">
                
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
        $(document).ready(function()
            {
               $("#get").click(function() 
               {
                   $.get("{{URL::to('artical/get')}}",function(data)
                   {
                       $("#getarticle").empty();
                       $.each(data,function(i,value)
                       {
                           
                           var tr = $("<tr>");
                               tr.append($("<td>",
                               {
                                   text:value.title
                               })).append($("<td>",{
                                   text:value.body
                               }));
                            $("#getarticle").append(tr);
                       });
                   });
                });
            });
    </script>
@endsection
