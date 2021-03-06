<?php

namespace app\modules\user\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ChildSearch represents the model behind the search form of `app\modules\user\models\Child`.
 */
class ChildSearch extends Child
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by', 'user_id', 'gender', 'date', 'is_invalid', 'is_study'], 'integer'],
            [['fio', 'file_passport', 'file_registration', 'file_birth', 'file_address', 'file_ejd', 'file_personal', 'file_invalid', 'file_posobie', 'file_study', 'file_scholarship'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Child::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
            'deleted_at' => $this->deleted_at,
            'deleted_by' => $this->deleted_by,
            'user_id' => $this->user_id,
            'gender' => $this->gender,
            'date' => $this->date,
            'is_invalid' => $this->is_invalid,
            'is_study' => $this->is_study,
        ]);

        $query->andFilterWhere(['like', 'fio', $this->fio])
            ->andFilterWhere(['like', 'passport_file', $this->passport_file]);

        return $dataProvider;
    }
}
