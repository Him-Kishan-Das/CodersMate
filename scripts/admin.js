let category = document.getElementById('categorySec');
let query = document.getElementById('querySec');
let reply = document.getElementById('replySec');
let catBtn = document.getElementById('CategoryBtn');
let queryBtn = document.getElementById('QueryBtn');
let replyBtn = document.getElementById('ReplyBtn');


catBtn.style.background = 'black';
catBtn.style.color = 'rgb(235, 9, 88)';
                                       
function showCategories(){
    var categoryDisplay = category.style.display;

    query.style.display = 'none';
    reply.style.display = 'none';
    queryBtn.style.background = 'transparent';
    queryBtn.style.color = 'black';
    replyBtn.style.background = 'transparent';
    replyBtn.style.color = 'black';

    if(categoryDisplay == 'block'){
        category.style.display = 'none';
        catBtn.style.background = 'transparent';
        catBtn.style.color = 'black';
    }
    else{
        category.style.display = 'block';
        catBtn.style.background = 'black';
        catBtn.style.color = 'rgb(235, 9, 88)';
    }
}

function showQueries(){


    var queryDisplay = query.style.display;


    category.style.display = 'none';
    reply.style.display = 'none';
    catBtn.style.background = 'transparent';
    catBtn.style.color = 'black';
    replyBtn.style.background = 'transparent';
    replyBtn.style.color = 'black';

    if(queryDisplay == 'block'){
        query.style.display = 'none';
        queryBtn.style.background = 'transparent';
        queryBtn.style.color = 'black';
    }
    else{
        query.style.display = 'block';
        queryBtn.style.background = 'black';
        queryBtn.style.color = 'rgb(235, 9, 88)';
    }
}

function showReplies(){

    var replyDisplay =reply.style.display;


    category.style.display = 'none';
    query.style.display = 'none';
    queryBtn.style.background = 'transparent';
    queryBtn.style.color = 'black';
    catBtn.style.background = 'transparent';
    catBtn.style.color = 'black';

    if(replyDisplay == 'block'){
        reply.style.display = 'none';
        replyBtn.style.background = 'transparent';
        replyBtn.style.color = 'black';
    }
    else{
        reply.style.display = 'block';
        replyBtn.style.background = 'black';
        replyBtn.style.color = 'rgb(235, 9, 88)';
    }
}