var i = 0;
    
$('tr > td >button#editButton').click(function(){
  $tr = $(this).closest('tr');
  var Value = $tr.children('td').map(function(){
    return $(this).text()
  }).get()
  $('#editUsername').val(Value[0]);
  $('#editPassword').val($('#passwordColumn').text());
})