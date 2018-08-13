'use strict';
let General = (function () {
    function ajaxStart(url) {
        let theAjax = new XMLHttpRequest();
        theAjax.open('POST', url, true);
        theAjax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        return theAjax;
    }

    function ajaxParser(theAjax, element) {
        let resp = theAjax.responseText;

        let parser = new DOMParser();
        let xmlDoc = parser.parseFromString(resp, "text/html");
        let tds = xmlDoc.getElementById(element);

        return document.getElementById(element).innerHTML = tds.innerHTML;
    }

    return {
        ajaxStart: ajaxStart,
        ajaxParser: ajaxParser
    }
})();

let Topic = (function () {
    function deleteTopic(event) {
        if (confirm('naozaj chcete tuto temu vymazat?')) {
            const id = event.target.previousElementSibling.value;
            let theAjax = General.ajaxStart('helpers/topic_helper.php');
            theAjax.onreadystatechange = function () {
                if (theAjax.readyState === 4 && theAjax.status === 200) {
                    document.getElementById('the-topic-' + id).remove();
                }
            };
            theAjax.send("ajax_topic_id=" + id);
        }
        event.preventDefault();
    }

    function addTopic(event) {
        const name = document.querySelector('#topic-name').value;
        if (name === '') {
            return alert('pole nazov nesmie byt prazdne');
        }
        let theAjax = General.ajaxStart('helpers/topic_helper.php');
        theAjax.onreadystatechange = function () {
            if (theAjax.readyState === 4 && theAjax.status === 200) {
                General.ajaxParser(theAjax, 'all-topics');
                document.querySelector('#topic-name').value = '';
            }
        };
        theAjax.send("ajax-topic-name=" + name);

        event.preventDefault();
    }

    return {
        deleteTopic: deleteTopic,
        addTopic: addTopic
    }
})();

let Comment = (function () {
    function deleteComment(event) {
        if (confirm('Naozaj chcete komentar vymazat?')) {
            let id = event.target.previousElementSibling.value;
            let theAjax = General.ajaxStart('helpers/index_helper.php');
            theAjax.onreadystatechange = function () {
                if (theAjax.readyState === 4 && theAjax.status === 200) {
                    document.getElementById('the-comment-' + id).remove();
                    document.getElementById('delete-comment-form-' + id).remove();
                }
            };
            theAjax.send('ajax-comment-id=' + id);
        }
        event.preventDefault();
    }

    function addComment(event) {
        let author = document.querySelector('#comment-author').value;
        let email = document.querySelector('#comment-email').value;
        let text = document.querySelector('#comment').value;
        let topicId = document.querySelector('#topic-id').value;

        if (author === '' || email === '' || text === '') {
            return alert('vsetky polia musia byt vyplnene');
        }

        let theAjax = General.ajaxStart('helpers/index_helper.php');
        theAjax.onreadystatechange = function () {
            if (theAjax.readyState === 4 && theAjax.status === 200) {
                General.ajaxParser(theAjax, 'all-comments');

                document.querySelector('#comment-author').value = '';
                document.querySelector('#comment-email').value = '';
                document.querySelector('#comment').value = '';
            }
        };
        theAjax.send('ajax-comment-author=' + author + '&ajax-comment-email=' + email +
            '&ajax-comment-text=' + text + '&ajax-topic-id=' + topicId);

        event.preventDefault();
    }

    return {
        deleteComment: deleteComment,
        addComment: addComment
    }
})();

let Response = (function () {
    function deleteResponse(event) {
        if (confirm('Naozaj chcete reakciu vymazat?')) {
            let id = event.target.previousElementSibling.value;
            let theAjax = General.ajaxStart('helpers/index_helper.php');
            theAjax.onreadystatechange = function () {
                if (theAjax.readyState === 4 && theAjax.status === 200) {
                    document.getElementById('the-response-' + id).remove();
                }
            };
            theAjax.send('ajax-response-id=' + id);
        }
        event.preventDefault();
    }

    function addResponse(event) {
        let commentId = event.target.previousElementSibling.value;
        let author = document.querySelector('#author-response-' + commentId).value;
        let text = document.querySelector('#comment-response-' + commentId).value;
        let topicId = event.target.previousElementSibling.previousElementSibling.value;

        if (author === '' || text === '') {
            return alert('vsetky polia musia byt vyplnene');
        }

        if (confirm('naozaj chcete pridat reakciu?')) {
            let theAjax = General.ajaxStart('helpers/index_helper.php');
            theAjax.onreadystatechange = function () {
                if (theAjax.readyState === 4 && theAjax.status === 200) {
                    General.ajaxParser(theAjax, 'all-responses-' + commentId);

                    document.querySelector('#author-response-' + commentId).value = '';
                    document.querySelector('#comment-response-' + commentId).value = '';
                }
            };
            theAjax.send('ajax-response-author=' + author + '&ajax-response-text=' + text +
                '&ajax-comment-id=' + commentId + '&ajax-topic-id=' + topicId);
        }
        event.preventDefault();
    }

    function toggleResponseForm(event) {
        let commentId = event.target.previousElementSibling.value;
        let responseForm = document.getElementById('response-form-' + commentId);
        responseForm.classList.toggle('hide');
    }

    return {
        deleteResponse: deleteResponse,
        addResponse: addResponse,
        toggleResponseForm: toggleResponseForm
    }
})();