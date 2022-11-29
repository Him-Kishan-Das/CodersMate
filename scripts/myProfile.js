let query = document.getElementById('userQueries');
let reply = document.getElementById('userReplies');
let note = document.getElementById('userNotes');


function showQuery() {

    var queryDisplay = query.style.dispaly;

    reply.style.display = 'none';
    note.style.display = 'none';
    if (queryDisplay == 'block') {
        query.style.dispaly = 'none';
    }
    else {
        query.style.display = 'block';
    }
}
function showReply() {
    var replyDisplay = reply.style.dispaly;

    query.style.display = 'none';
    note.style.display = 'none';
    if (replyDisplay == 'block') {
        reply.style.dispaly = 'none';
    }
    else {
        reply.style.display = 'block';
    }
}

function showNote() {
    var noteDisplay = note.style.dispaly;

    query.style.display = 'none';
    reply.style.display = 'none';
    if (noteDisplay == 'block') {
        note.style.dispaly = 'none';
    }
    else {
        note.style.display = 'block';
    }
}