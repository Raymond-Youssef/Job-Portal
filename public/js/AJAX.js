// function changeImage(user_id) {
//     let result = confirm("Are you sure you want to delete this user?");
//     if (result) {
//         let xhr = new XMLHttpRequest();
//         xhr.open("POST", "../App/deleteUser.php", true);
//         let data = {
//             "id": user_id
//         };
//         xhr.setRequestHeader("Content-Type", "application/json");
//         xhr.onreadystatechange = function () {
//             if (this.readyState == 4 && this.status == 200) {
//                 console.log("done");
//                 let deleted = 'user-id=' + user_id;
//                 document.getElementById(deleted).remove();
//             }
//         };
//         xhr.send(JSON.stringify(data));
//     }
// }

// function changeImage() {
//     $.ajax({
//         type:'POST',
//         url:'/image/store',
//         data:'_token = <?php echo csrf_token() ?>',
//         success:function(data) {
//             $("#msg").html(data.msg);
//         }
//     });
// }


// $(document).ready(function (){
//    $('#image-form').on('submit', function (event){
//       event.preventDefault();
//       $.ajax()
//    });
// });
