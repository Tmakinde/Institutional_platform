@extends('User.layouts.master')

@section('title')
{{$currentInstitution->name}} | Portal
@endsection

@section('content')
   
    <table class ="table table-bordered" style ="min-height:500px;border-collapse:collapse;margin-top:50px">
      <tr>
        <td style ="width:100px;background-color:purple;">
          <table class ="table" >
          @foreach($topics as $topic)
            <tr>
              <td style ="background-color:purple;border-width:0">
                <form class="topicForm" >
                  @csrf
                  {{method_field('GET')}}
                  <b><input type ="submit" class="btn submit" value = "{{$topic->Title}}" style="color:red;text-height:20px"></b>
                  <a type ="button" class ="btn btn-info" href ="{{route('test-question', ['topic_id'=>$topic->id])}}"><small>start test</small></a>
                </form>
              </td>
            </tr>
          @endforeach
          </table>
        </td>
        <td >
        <table class="table" id ="table" >
          <thead>
            <tr>
              <th scope="col" style ="color:red;text-align:center;font-family:Helvetica;"><h2><b id = "titleHead"></b></h2></th>
            </tr>
          </thead>
          <tbody>
            <tr style ="">
              <td class = "topicContent" style ="line-height:35px;font-family:Arial;text-justify:inter-word;text-align: justify"></td>
            </tr>
            <tr>
              <td><a href ="#"> </a></td>
            </tr>
          </tbody>
	      </table>
        </td>
      </tr>
    </table> 
@endsection

@section('scripts')
    <script>
   // console.log($('.hiddenValue').val());

      $(document).ready(function(){
        $('table#table').hide();
      //  console.log($('.hiddenValue').val());
      $('.submit').on('click', function(event){
        event.preventDefault();
      //  console.log($('.submit').val());

      $('table#table').show();
      $('table#table').css('background-color', 'white');
        $input = $(this).closest('input');
        var topic = $input.val();
        $('td > a').attr('href', '{{route("download-file")}}' + '?title=' + topic);
        $('td > a').text('Download Course Material');
          $.ajax({
            url: '{{route("Get-Topic")}}' + '?title=' + topic,
            method:'GET',
            success:function(data){
              $('#titleHead').text(data.topicTitle);
            //  console.log(data.topicTitle);
              
              $('.topicContent').html(data.topicContent);
              $('img').addClass('img-responsive');
              $('img').css('max-width','400px');
              $('img').css('max-height','400px');
              
            },
            error:function(jqXHR, textStatus, errorThrown){
              console.log(jqXHR);
              console.log(textStatus);
              console.log(errorThrown);
            }
          });
          // download ajax
        
        })
      })
    </script>
  @parent
@endsection