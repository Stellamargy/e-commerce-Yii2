<?php

/** @var yii\web\View $this */
/** @var common\models\Product[] $products */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\models\ProductCategory;

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;

$dropdownOptions = [
    'class' => 'form-control',
    'prompt' => 'Select Category',
    'data-url' => \yii\helpers\Url::to(['product/index']),
    'onchange' => 'filterProducts(this.value)'
];

$productsCategory = ProductCategory::find()->all();
$categoryList = ArrayHelper::map($productsCategory, 'id', 'category_name');
?>

<div class="wrapper">
    <!-- search and dropdown filters -->
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

    <!-- products container -->
    <?php
    echo  $this->render('_products',['products'=>$products]);
    ?>
</div>


<?php
$js = <<<JS
window.filterProducts = function(categoryId) {
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
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
};

window.searchProducts = function(searchTerm) {
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
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
};

// Optional: Add debounce to prevent too many requests while typing
let searchTimeout;
$('#search-filter').on('keyup', function() {
    clearTimeout(searchTimeout);
    const searchTerm = $(this).val();
    
    searchTimeout = setTimeout(function() {
        window.searchProducts(searchTerm);
    }, 500); // Wait 500ms after user stops typing
});
JS;
$this->registerJs($js);

?>