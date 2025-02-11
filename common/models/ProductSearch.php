<?php
namespace common\models ;
use common\models\Product;
use yii\data\ActiveDataProvider;

class ProductSearch extends Product{
    public function rules()
    {
        return [
            [['id','product_price','product_quantity'], 'integer'],  
            [['product_name', 'product_description' ,'product_category_id'], 'safe'], 
        ];
    }

    public function search($params)
    {
        $query = Product::find();

        
        $query->joinWith('productCategory');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->load($params) || !$this->validate()) {
            return $dataProvider;
        }

        // Add filtering conditions
        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['product_quantity' => $this->product_quantity]);
        $query->andFilterWhere(['product_price' => $this->product_price]);
        $query->andFilterWhere(['like', 'product_name', $this->product_name]);
        $query->andFilterWhere(['like', 'product_description', $this->product_description]);
        $query->andFilterWhere(['like', 'product_category.category_name', $this->product_category_id]);
        

        return $dataProvider;
    }

}