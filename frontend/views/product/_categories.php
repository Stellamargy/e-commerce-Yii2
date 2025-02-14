<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\models\ProductCategory;

$dropdownOptions = [
    'class' => 'form-control',
    'prompt' => 'Select Category',
    'data-url' => \yii\helpers\Url::to(['your/filter-action']),
    'onchange' => 'filterProducts(this.value)'
];

$productsCategory = ProductCategory::find()->all();
$categoryList = ArrayHelper::map($productsCategory, 'id', 'category_name');
?>

<div class="row mb-4">
    <div class="col-md-6">
        <div class="form-group">
            <?= Html::dropDownList('category-filter', null, $categoryList, $dropdownOptions) ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <?= Html::textInput('search-filter', null, [
                'class' => 'form-control',
                'placeholder' => 'Search products...',
                'onkeyup' => 'searchProducts(this.value)'
            ]) ?>
        </div>
    </div>
</div>

<?php
$js = <<<JS
function filterProducts(categoryId) {
    const url = $('#category-filter').data('url');
    const searchTerm = $('#search-filter').val();
    
    $.ajax({
        url: url,
        type: 'GET',
        data: {
            category: categoryId,
            search: searchTerm
        },
        success: function(response) {
            $('#products-container').html(response);
        }
    });
}

function searchProducts(searchTerm) {
    const url = $('#category-filter').data('url');
    const categoryId = $('#category-filter').val();
    
    $.ajax({
        url: url,
        type: 'GET',
        data: {
            category: categoryId,
            search: searchTerm
        },
        success: function(response) {
            $('#products-container').html(response);
        }
    });
}

// Optional: Add debounce to prevent too many requests while typing
let searchTimeout;
$('#search-filter').on('keyup', function() {
    clearTimeout(searchTimeout);
    const searchTerm = $(this).val();
    
    searchTimeout = setTimeout(function() {
        searchProducts(searchTerm);
    }, 500); // Wait 500ms after user stops typing
});
JS;
$this->registerJs($js);
?>