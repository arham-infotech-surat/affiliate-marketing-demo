$(function () {
    $(".sortable").sortable({
        connectWith: ".sortable",
        items: ".card-draggable",
        revert: !0,
        placeholder: "card-draggable-placeholder",
        forcePlaceholderSize: !0,
        opacity: .77,
        cursor: "move"
    })
});