$(document).ready(function(){
    new DataTable('#DataTable',{
        info: false,
        ordering: false,
        filter:false,
        lengthChange: false,
        pagingType:'simple_numbers',
        "tabIndex": 1,
        "language": {
            "emptyTable": "Brak danych"
        }
    });
})
