// var Table = function(el){
//  this.$el = $(el);
// };

// Table.prototype.updatePagination = function(){
//  $('.footer').text((currentPage+1)+'/'+(totalPages+1));

//              var end = (currentPage+1)*maxRows,
//                  begin = end-maxRows+1;

//              $('.header-pag span').text(begin+'-'+end);
// };

// Table.prototype.nextPage = function(){
    
// };



$('table tbody').each(function(){

    var $this = $(this),
        $rows = $this.find('tr'),
        maxRows = 5,
        firstTen = $rows.slice(0, (maxRows)),
        currentPage = 0,
        totalPages = Math.floor($rows.length/maxRows);

    // By default display first ones

    var slicedRows = sliceRows(currentPage, maxRows);
    displayRows(slicedRows);
    updatePag();

    //Returns slice array of courses
    function sliceRows(page, max) {
        var end = (page+1)*maxRows,
            begin = end-maxRows;
        return (
            $rows.slice(begin, end)
        );
    }
    
    function sliceRowsFilter(page, max){
        var end = (page+1)*maxRows,
            begin = end-maxRows;
        return (
            $rows.filter('.hello').slice(begin, end)
        );
        
    }

    //Updates pagination
    function updatePag() {
        $('.inboxFooter').text((currentPage+1)+'/'+(totalPages+1));

        var end = (currentPage+1)*maxRows,
            begin = end-maxRows+1;

        $('.header-pag span').text(begin+'-'+end+' of '+$rows.length+' courses');
    }

    function displayRows(rows){
        $this.html(rows);
    }

    //Next page
    function next(){
        if(currentPage < totalPages){
            var slicedRows = sliceRows(currentPage+1, maxRows);
            displayRows(slicedRows);
            currentPage++;
            updatePag();
        }
    }

    //Previous page
    function prev(){
        if(currentPage > 0){
            var slicedRows = sliceRows(currentPage-1, maxRows);
            displayRows(slicedRows);
            currentPage--;
            updatePag();
        } else {
            console.log('whooops');
        }
    }
    
    //Bind clikc events
    $('.next').click(function(){    
        next();
        console.log(currentPage+'/'+totalPages);
        return false;               
    });

    $('.prev').click(function(){    
        prev();
        console.log(currentPage+'/'+totalPages);
        return false;               
    });
    
    $('#show').change(function(){

        maxRows = $(this).val();
        currentPage = 0;        
        totalPages = Math.floor($rows.length/maxRows);
        
        if(maxRows == 1000){
            $('.header-pag').hide();
        } else {
            $('.header-pag').show();
        }
        
        var slicedRows = sliceRows(currentPage, maxRows);
        displayRows(slicedRows);
        updatePag();
    });
    
    $('#filter').keyup(function(){
        if($(this).val()){
            
            maxRows = 1000;
            
            $('.header-pag').hide();
            $('#show').hide();

            var $this = $(this);
            setTimeout(function(){
                var val = $this.val();
                $("tr").removeClass('visible');
                $("tr td:first-child").filter(function() {
                    var text = $(this).text();
                    var lower = text.toLowerCase();
                    console.log(val +'-'+lower);
                    return lower.indexOf(val) !== -1;
                }).parent().addClass('visible');

            }, 500);
        
        } else {

            maxRows = 5;
            $('#show').show();
            
            $('.header-pag').show();    
        }
        
        currentPage = 0;        
        totalPages = Math.floor($rows.length/maxRows);
        var slicedRows = sliceRows(currentPage, maxRows);
        displayRows(slicedRows);
        updatePag();
            
        
    });
}); 







