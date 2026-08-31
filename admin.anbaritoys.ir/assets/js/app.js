$('.summernote').summernote({
    height:400,
    tabSize:2
});

$('#datatable_products').DataTable({
    responsive:true
});

// تولتیپ برای دکمه‌های جدول‌ها (delegated تا با صفحه‌بندی DataTables هم کار کند)
$('body').tooltip({
    selector: '[data-toggle="tooltip"]'
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
    maxFilesize:3,
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
    maxFilesize:3,
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
                    location.replace('https://admin.anbaritoys.ir/')
                }
            })
        },
        error: function (error){
            console.log(error)
        },
    });
})


function createProducts(){
    let title = $('#title').val()
    let english_title = $('#english_title').val()
    let stock = $('#stock').val()
    let brand_id = $('#brand_id').val()
    let many = $('#many').val()
    let price = $('#price').val()
    let price_discounted = $('#price_discounted').val()
    let review = $('#review').val()
    let description = $('#description').val()
    let label = $('#label').val()
    let MiniDescription = $('#qqqqqqq').val()
    let formCreateProducts = $('#formCreateProducts').val()
    $.ajax({
        url: 'requests/ProductsRequest.php',
        method: 'post',
        dataType: 'json',
        data: {
            title: title,
            english_title: english_title,
            stock: stock,
            brand_id: brand_id,
            many: many,
            price: price,
            price_discounted: price_discounted,
            review: review,
            description: description,
            label: label,
            MiniDescription: MiniDescription,
            action: 'create_product'
        },
        success: function (response) {
            if (response.status == 200) {
                Swal.fire({
                    title: response.title,
                    html: response.text ? response.text : response.messages,
                    icon: response.type ? response.type : 'error',
                    confirmButtonText: 'متوجه شدم!',
                })
                window.location.assign("manage_products_category.php?product_id="+response.id)
                $("#print-error-msg").css('display','none')
            }else{
                    $("#print-error-msg").css('display','block')
                    document.getElementById('print-error-msg').innerHTML = response.message
                Swal.fire({
                    title: response.title,
                    html: response.text ? response.text : response.messages,
                    icon: response.type ? response.type : 'error',
                    confirmButtonText: 'متوجه شدم!',
                })
            }
        },
        error: function (error) {
            $("#print-error-msg").css('display','none')
            console.log(error)
        },
    });
}

//print error
function printErrorMsg (msg) {
    let print = $("#print-error-msg").find("ul").html('');
    console.log(print)
    $("#print-error-msg").css('display','block');
    $.each( msg, function( key, value ) {
        $("#print-error-msg").find("ul").append('<li>'+value+'</li>');
    });
}



function createArticles(){
    let title = $('#title').val();
    let Created = $('#Created').val();
    let label = $('#label').val();
    let MiniDescription = $('#MiniDescription').val();
    let description = $('#productDescription').val();
    $.ajax({
        url: 'requests/perper.php',
        method: 'post',
        dataType: 'json',
        data: {
            action: 'insert_paper',
            title: title,
            Created: Created,
            label: label,
            MiniDescription: MiniDescription,
            description: description,
        },
        success: function (response) {
                    if (response.status === 200) {
                            Swal.fire({
                                title: response.title,
                                html: response.text ? response.text : response.messages,
                                icon: response.type ? response.type : 'error',
                                confirmButtonText: 'متوجه شدم!',
                            })
                            $("#print-error-msg").css('display','none')
                        }else{
                            $("#print-error-msg").css('display','block')
                            document.getElementById('print-error-msg').innerHTML = response.message
                            Swal.fire({
                                title: response.title,
                                html: response.text ? response.text : response.messages,
                                icon: response.type ? response.type : 'error',
                                confirmButtonText: 'متوجه شدم!',
                            })
                        }
        },
        error: function (error) {
            console.log(error)
        },
    })
}



$(document).on("change", "#insertBottomBannerCat", function (event) {
    event.preventDefault();
    let option = $('#insertBottomBannerCat').val();
    let test = '#optionTile' + option;
    let title = document.querySelector(test).innerHTML;
    let product_id = $('div.products_id_category').data('id');
    let fromDataSetElem = $('.fromDataSet')
    $.ajax({
        url: 'requests/ProductsRequest.php',
        method: 'post',
        dataType: 'json',
        data: {
            category_id: option,
            product_id: product_id,
            action: 'createCategoryToProducts'
        },
        success: function (response) {
            Toast.fire({
                icon: response.type,
                title: response.text,
            })

                .then(function () {

                })
            if (response.status === 200) {
                let button = document.createElement('button');
                button.name = 'ids'
                button.value = option
                button.className = 'btn btn-outline-danger'
                button.style.fontSize = '20px'
                button.innerHTML = ' <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">\n' +
                    '                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>\n' +
                    '                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>\n' +
                    '                            </svg>' + title
                fromDataSetElem.append(button)
            }
        },
        error: function (error) {
            console.log(error);
        },

    })
});

$(document).on("change", "#insertBottomBannerCat2", function (event) {
    event.preventDefault();
    let option = $('#insertBottomBannerCat2').val();
    let test = '#optionTile' + option;
    let title = document.querySelector(test).innerHTML;
    let product_id = $('div.products_id_category').data('id');
    let fromDataSetElem = $('.fromDataSet')
    console.log(option)
    $.ajax({
        url: 'requests/ProductsRequest.php',
        method: 'post',
        dataType: 'json',
        data: {
            category_id: option,
            product_id: product_id,
            action: 'createCategoryToProducts'
        },
        success: function (response) {
            Toast.fire({
                icon: response.type,
                title: response.text,
            })

                .then(function () {

                })
            if (response.status === 200) {
                let button = document.createElement('button');
                button.name = 'ids'
                button.value = option
                button.className = 'btn btn-outline-danger'
                button.style.fontSize = '20px'
                button.innerHTML = ' <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">\n' +
                    '                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>\n' +
                    '                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>\n' +
                    '                            </svg>' + title
                fromDataSetElem.append(button)
            }
            if (response.status === 400) {
                Toast.fire({
                    icon: response.type,
                    title: response.text,
                })
            }
        },
        error: function (error) {
            console.log(error);
        },

    })
});

$(document).on("change", "#insertBottomBannerCat3", function (event) {
    event.preventDefault();
    let option = $('#insertBottomBannerCat3').val();
    let test = '#optionTile' + option;
    let title = document.querySelector(test).innerHTML;
    let product_id = $('div.products_id_category').data('id');
    let fromDataSetElem = $('.fromDataSet')
    $.ajax({
        url: 'requests/ProductsRequest.php',
        method: 'post',
        dataType: 'json',
        data: {
            category_id: option,
            product_id: product_id,
            action: 'createCategoryToProducts'
        },
        success: function (response) {
            Toast.fire({
                icon: response.type,
                title: response.text,
            })

                .then(function () {

                })
            if (response.status === 200) {
                let button = document.createElement('button');
                button.name = 'ids'
                button.value = option
                button.className = 'btn btn-outline-danger'
                button.style.fontSize = '20px'
                button.innerHTML = ' <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">\n' +
                    '                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>\n' +
                    '                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>\n' +
                    '                            </svg>' + title
                fromDataSetElem.append(button)
            }
        },
        error: function (error) {
            console.log(error);
        },

    })
});

$(document).on("change", "#insertBottomBannerCat4", function (event) {
    event.preventDefault();
    let option = $('#insertBottomBannerCat4').val();
    let test = '#optionTile' + option;
    let title = document.querySelector(test).innerHTML;
    let product_id = $('div.products_id_category').data('id');
    let fromDataSetElem = $('.fromDataSet')
    $.ajax({
        url: 'requests/ProductsRequest.php',
        method: 'post',
        dataType: 'json',
        data: {
            category_id: option,
            product_id: product_id,
            action: 'createCategoryToProducts'
        },
        success: function (response) {
            Toast.fire({
                icon: response.type,
                title: response.text,
            })

                .then(function () {

                })
            if (response.status === 200) {
                let button = document.createElement('button');
                button.name = 'ids'
                button.value = option
                button.className = 'btn btn-outline-danger'
                button.style.fontSize = '20px'
                button.innerHTML = ' <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">\n' +
                    '                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>\n' +
                    '                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>\n' +
                    '                            </svg>' + title
                fromDataSetElem.append(button)
            }
        },
        error: function (error) {
            console.log(error);
        },

    })
});

// بج‌های وضعیت/پیشنهادی — باید هم‌راستا با خروجی PHP در manage_products_content.php باشد
function anbarStatusBadge(status) {
    const map = {
        active:       ['فعال', 'success'],
        inactive:     ['غیر فعال', 'danger'],
        unavialable:  ['ناموجود', 'warning'],
        stop_selling: ['توقف فروش', 'warning'],
    };
    const [text, color] = map[status] || ['نامشخص', 'secondary'];
    return '<span class="label label-lg label-inline font-weight-bold label-light-' + color + '">' +
        '<span class="label label-dot label-' + color + ' mr-2"></span>' + text + '</span>';
}

function anbarSuggestedBadge(suggested) {
    const map = { yes: ['پیشنهادی', 'success'], no: ['عادی', 'secondary'] };
    const [text, color] = map[suggested] || ['نامشخص', 'secondary'];
    return '<span class="label label-lg label-inline font-weight-bold label-light-' + color + '">' +
        '<span class="label label-dot label-' + color + ' mr-2"></span>' + text + '</span>';
}

function change_statusProducts($products_id){
    const cell = document.getElementById('status' + $products_id);
    const current = cell.dataset.status === 'active' ? 'inactive' : 'active';
    $.ajax({
        url: 'requests/ProductsRequest.php',
        method: 'get',
        dataType: 'json',
        data: {
            action: 'change_status_products',
            products_id: $products_id,
            old_status_product: current,
        },
        success: function (response) {
            if (response.status === 200) {
                cell.dataset.status = current;
                cell.innerHTML = anbarStatusBadge(current);
            }
            Swal.fire({
                title: response.title,
                html: response.text ? response.text : response.messages,
                icon: response.type ? response.type : 'error',
                confirmButtonText: 'متوجه شدم!',
            })
        },
        error: function (error) {
            console.log(error)
        },
    })
}


function change_SuggestedProducts($products_id){
    const cell = document.getElementById('Suggested' + $products_id);
    const current = cell.dataset.suggested === 'yes' ? 'no' : 'yes';
    $.ajax({
        url: 'requests/ProductsRequest.php',
        method: 'get',
        dataType: 'json',
        data: {
            action: 'change_Suggested_products',
            products_id: $products_id,
            old_Suggested_product: current,
        },
        success: function (response) {
            if (response.status === 200) {
                cell.dataset.suggested = current;
                cell.innerHTML = anbarSuggestedBadge(current);
            }
            Swal.fire({
                title: response.title,
                html: response.text ? response.text : response.messages,
                icon: response.type ? response.type : 'error',
                confirmButtonText: 'متوجه شدم!',
            })
        },
        error: function (error) {
            console.log(error)
        },
    })
}


function deleteProductConfirm($products_id, btn){
    const title = $(btn).closest('tr').find('.product-title').text().trim() || ('کد ' + $products_id);
    Swal.fire({
        title: 'حذف محصول',
        html: 'محصول <b>' + title + '</b> برای همیشه حذف شود؟<br><small class="text-muted">این عملیات قابل بازگشت نیست.</small>',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'بله، حذف کن',
        cancelButtonText: 'انصراف',
        confirmButtonColor: '#d33',
    }).then(function (result) {
        if (!result.isConfirmed) return;
        $.ajax({
            url: 'requests/ProductsRequest.php',
            method: 'get',
            dataType: 'json',
            data: {
                action: 'delete_product',
                products_id: $products_id,
            },
            success: function (response) {
                if (response.status === 200) {
                    $('#datatable_products').DataTable().row($(btn).closest('tr')).remove().draw(false);
                }
                Swal.fire({
                    title: response.title,
                    html: response.text ? response.text : response.messages,
                    icon: response.type ? response.type : 'error',
                    confirmButtonText: 'متوجه شدم!',
                })
            },
            error: function (error) {
                console.log(error)
            },
        })
    })
}
