document.addEventListener('DOMContentLoaded', function () {
    // Kategorije
    const parentCategory = document.getElementById('parent-category');
    const childCategory = document.getElementById('child-category');

    if (parentCategory && childCategory) {
        parentCategory.addEventListener('change', function () {
            const parentId = this.value;

            if (!parentId) {
                childCategory.innerHTML = '<option selected>Choose subcategory</option>';
                return;
            }

            childCategory.innerHTML = '<option>Loading...</option>';

            fetch(`/categories/${parentId}/children`)
                .then(response => response.json())
                .then(children => {
                    let options = '<option selected>Choose subcategory</option>';
                    children.forEach(child => {
                        options += `<option value="${child.id}">${child.name}</option>`;
                    });
                    childCategory.innerHTML = options;
                })
                .catch(() => {
                    childCategory.innerHTML = '<option>Error loading subcategories</option>';
                });
        });
    }

    // Preview slike
    const input = document.getElementById('formFile');
    const previewContainer = document.getElementById('previewContainer');
    const previewImage = document.getElementById('previewImage');

    if (input && previewContainer && previewImage) {
        input.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                    previewContainer.style.display = 'block';
                };

                reader.readAsDataURL(file);
            } else {
                previewContainer.style.display = 'none';
                previewImage.src = '';
            }
        });
    }
});

