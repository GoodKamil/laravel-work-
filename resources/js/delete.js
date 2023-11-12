import axios from "axios";
$(function(){
    $('[data-method]').click(function(){
        event.preventDefault();
        const value=$(this).data('value');
        Swal.fire({
            title: TITLE,
            icon:'question',
            showCancelButton: true,
            confirmButtonText: 'Tak',
            cancelButtonText: `Nie`,
        }).then(result=>{
            result.value &&  axios.delete(`${mURL}/${value}`, {
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            }).then(response=>{
                Swal.fire({
                    title: response.data.message,
                    icon: response.data.codeText,
                    cancelButtonText: 'OK',
                }).then(result => {
                    if(response.data.codeText==='success') {
                        $(`#dtable-${value}`).addClass('dAnimatiom');
                        setInterval(() => {
                            $(`#dtable-${value}`).css('display', 'none')
                        }, 1800)
                    }
                })

            }).catch(function (error) {
                console.error(error)
            });
        }).catch(function (error) {
            console.error(error)
        });
    })
})
