let category = document.getElementById('categorySec');
let query = document.getElementById('querySec');
let reply = document.getElementById('replySec');

function showCategories(){
    var categoryDisplay = category.style.display;

    query.style.display = 'none';
    reply.style.display = 'none';

    if(categoryDisplay == 'block'){
        category.style.display = 'none';
    }
    else{
        category.style.display = 'block';
    }
}

function showQueries(){


    var queryDisplay = query.style.display;

    category.style.display = 'none';
    reply.style.display = 'none';

    if(queryDisplay == 'block'){
        query.style.display = 'none';
    }
    else{
        query.style.display = 'block';
    }
}

function showReplies(){

    var replyDisplay =reply.style.display;

    category.style.display = 'none';
    query.style.display = 'none';

    if(replyDisplay == 'block'){
        reply.style.display = 'none';
    }
    else{
        reply.style.display = 'block';
    }
}