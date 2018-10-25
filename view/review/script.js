function validateRating() {
    console.log('val rate')
    var rating = document.getElementsByName('rating');
    var checked = false;
    for (var i = 0; i < rating.length; i++) {
        if (rating[i].checked) {
            checked = true;
        }
    }
    var ratingValidation = document.getElementById('rating-validation');
    if (! checked) {
        console.log('here')
        ratingValidation.innerText = 'This field is required';
        return false;
    } else {
        console.log('here2')
        ratingValidation.innerText = '';
        return true;
    }
}

function validateComment() {
    var comment = document.getElementById('comment').value;
    var commentValidation = document.getElementById('comment-validation');
    if (comment.length === 0) {
        console.log('here3')
        commentValidation.innerText = 'This field is required';
        return false;
    } else {
        console.log('here4')
        commentValidation.innerText = '';
        return true;
    }
}

var rating = document.getElementsByName('rating');
var comment = document.getElementById('comment');
var reviewForm = document.getElementById('review-form');

rating.onclick = validateRating;
comment.onchange = validateComment;

reviewForm.onsubmit = () => {
    validateRating();
    validateComment();
    if (!(validateRating() && validateComment())) {
        return false;
    } else {
        return true;
    }
}