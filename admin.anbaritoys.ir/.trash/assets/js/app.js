
$('.summernote').summernote({
    height:400,
    tabSize:2
});

$('#datatable_products').DataTable({
    responsive:true
});

$('#datatable_category').DataTable({
    responsive:true
});

$('#datatable_brand').DataTable({
    responsive:true
});

$('#datatable_Manager').DataTable({
    responsive:true
});


$('div#upload_photo_products').dropzone({
    url:"/requests/PhotoProductRequest.php",
    paramName:"photo_product",
    maxFiles:5,
    maxFilesize:1,
    addRemoveLinks:true,
    acceptedFiles:"image/*",
    params:{
        product_id:$('#input_product_id').val()
    },
    accept :function (file, done){
        done();
    },
    error :function(file, resp){
        console.log(JSON.parse(resp));
        let response = JSON.parse(resp);
        if (file.previewElement){
            file.previewElement.classList.add("dz-error");
            if (typeof response !== "string" && response.message){
                response = response.message;
                console.log(response);
            }
            for (let node of file.previewElement.querySelectorAll(
                "[data-dz-errormessage]"
            )){
                node.textContent = response;
            }
        }
    },
});


$('div.categoryTeat').dropzone({
    url:"/requests/PhotoProductRequest.php",
    paramName:"photo_category",
    maxFiles:5,
    maxFilesize:1,
    addRemoveLinks:true,
    acceptedFiles:"image/*",
    params:{
        product_id:$('#input_category_id').val()
    },
    accept :function (file, done){
        done();
    },
    error :function(file, resp){
        console.log(JSON.parse(resp));
        let response = JSON.parse(resp);
        if (file.previewElement){
            file.previewElement.classList.add("dz-error");
            if (typeof response !== "string" && response.message){
                response = response.message;
                console.log(response);
            }
            for (let node of file.previewElement.querySelectorAll(
                "[data-dz-errormessage]"
            )){
                node.textContent = response;
            }
        }
    },
});


$(document).on('submit','#form_manager_login',function (event) {
    event.preventDefault();
    let email = $('input[name=email]').val();
    let password = $('input[name=password]').val();
    $.ajax({
        url: 'requests/LoginRequest.php',
        method: 'post',
        dataType: 'json',
        data: {
            email: email,
            password: password,
            action: 'manager_login'
        },
        success: function (response) {
            Swal.fire({
                title: response.title,
                html: response.text ? response.text : response.messages,
                icon: response.type ? response.type : 'error',
                confirmButtonText:'متوجه شدم!',
            }).then(function (){
                if (response.status === 200){
                    window.location.assign("/")
                }
            })
        },
        error: function (error){
            console.log(error)
        },
    });
})
