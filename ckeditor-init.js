document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('textarea[data-ckeditor="true"]').forEach((textarea) => {
        if (textarea.id) {
            CKEDITOR.replace(textarea.id, {
                skin: 'kama',
            });
        }
    });
});
