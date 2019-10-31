console.log('hello email.js');
$(document).ready(function () {
    $( "#email" )
        .closest("span").setTimeout(function(){
        $('span').remove();
        }, 5000);
        // .setTimeout(function(){
        // $('#divID').remove();
        // }, 5000);

    // $( "#email" ).on('click',remove);
    //     function remove() {
    //         alert('click');
    //         $( "#email" )
    //             .closest("span");
    //             console.log($(this).closest("span"));
    //             .css("display", "none")
    //             .delay(1000).slideUp('fast');
    //         alert('removed');
    //     }
    // $('#email').on('click',removeMsg)
    // function removeMsg(){
        // var span = $('.invalid-feedback').closest('#email');
        // console.log(span)
        // alert($(this).closest('#email').find('invalid-feedback'));
    //
    //     $( "#email" )
    //         .closest( "span" )
    //         // .html('');
    //         .css( "display", "none" );
    //     // $(this).closest('.lfFormField').find('.form-field-title-sign-css');
    // }
});
