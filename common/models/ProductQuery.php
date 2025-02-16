<?php

namespace common\models;
use Yii;

/**
 * This is the ActiveQuery class for [[Product]].
 *
 * @see Product
 */
class ProductQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/


    /**
     * {@inheritdoc}
     * @return Product[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Product|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function filteredProducts()
    {
        //  filter parameters
        $categoryId = Yii::$app->request->get('category');
        $searchTerm = Yii::$app->request->get('search');

        // Apply category filter
        if ($categoryId) {
            $this->andWhere(['product_category_id' => $categoryId]);
        }

        // Apply search filter
        if ($searchTerm) {
            $this->andWhere(['like', 'product_name', $searchTerm]);
        }

        return $this; // Return the query object for chaining
    }

}
