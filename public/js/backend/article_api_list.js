// $( document ).ready(function() {
//     $.ajax({
//         type: "GET",
//         dataType: "json",
//         url: "http://192.168.10.10/api/articles",
//         success: function(data){
//             var html ='';
//             $.each(data.data, function (key,item) {
//                 console.log(item);
//                 html += '<tr><td class="table-text"><div>'+item.id +'</div></td>';
//                 html+= '<td class="table-text" >' +item.attributes.title + '</td></tr>';
//             });
//             console.log(html);
//             $('#tbody').append(html);
//         }
//     });
// });