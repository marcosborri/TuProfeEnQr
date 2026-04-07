var quill = new Quill('#editor', {
    theme: 'snow',
    modules: {
        toolbar: [
            [{ header: [1, 2, false] }],
            ['bold', 'italic'],
            [{ list: 'ordered' }, { list: 'bullet' }]
        ]
    }
});

quill.clipboard.addMatcher('IMG', function() {
    return { ops: [] };
});

quill.root.addEventListener('paste', function(e) {
    const items = e.clipboardData.items;

    for (let item of items) {
        if (item.type.includes('image')) {
            e.preventDefault();
        }
    }
});