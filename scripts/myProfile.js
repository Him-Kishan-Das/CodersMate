let query = document.getElementById('userQueries');
let reply = document.getElementById('userReplies');
let note = document.getElementById('userNotes');

let QBtn = document.getElementById('queryBtn');
let RBtn = document.getElementById('repliesBtn');
let NBtn = document.getElementById('notesBtn');

QBtn.style.color = 'rgb(14, 151, 19)';
QBtn.style.textDecoration = 'underline';


function showQuery() {

    var queryDisplay = query.style.dispaly;

    reply.style.display = 'none';
    note.style.display = 'none';
    RBtn.style.color = 'black';
    NBtn.style.color = 'black';
    RBtn.style.textDecoration = 'none';
    NBtn.style.textDecoration = 'none';

    if (queryDisplay == 'block') {
        query.style.dispaly = 'none';
        QBtn.style.color = 'black';
    }
    else {
        query.style.display = 'block';
        QBtn.style.color = 'rgb(14, 151, 19)';
        QBtn.style.textDecoration = 'underline';
    }
}
function showReply() {
    var replyDisplay = reply.style.dispaly;

    query.style.display = 'none';
    note.style.display = 'none';
    QBtn.style.color = 'black';
    NBtn.style.color = 'black';
    QBtn.style.textDecoration = 'none';
    NBtn.style.textDecoration = 'none';

    if (replyDisplay == 'block') {
        reply.style.dispaly = 'none';
        RBtn.style.color = 'black';
    }
    else {
        reply.style.display = 'block';
        RBtn.style.color = 'rgb(14, 151, 19)';
        RBtn.style.textDecoration = 'underline';
    }
}

function showNote() {
    var noteDisplay = note.style.dispaly;

    query.style.display = 'none';
    reply.style.display = 'none';
    RBtn.style.color = 'black';
    NBtn.style.color = 'black';
    RBtn.style.textDecoration = 'none';
    QBtn.style.textDecoration = 'none';

    if (noteDisplay == 'block') {
        note.style.dispaly = 'none';
        NBtn.style.color = 'black';
    }
    else {
        note.style.display = 'block';
        NBtn.style.color = 'rgb(14, 151, 19)';
        NBtn.style.textDecoration = 'underline';
    }
}