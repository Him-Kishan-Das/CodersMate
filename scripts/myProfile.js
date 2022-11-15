function showQuery(){
    let query = document.getElementById('userQueries');
    let reply = document.getElementById('userReplies');

    var queryDisplay = query.style.dispaly;
    
    reply.style.display = 'none';
    if(queryDisplay == 'block'){
        query.style.dispaly = 'none';
    }
    else{
        query.style.display = 'block';
    }
}
function showReply(){
    let query = document.getElementById('userQueries');
    let reply = document.getElementById('userReplies');

    var replyDisplay = reply.style.dispaly;
    
    query.style.display = 'none';
    if(replyDisplay == 'block'){
        reply.style.dispaly = 'none';
    }
    else{
        reply.style.display = 'block';
    }
}