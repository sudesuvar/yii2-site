<?php

namespace portalium\site\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use portalium\site\models\Preference;

/**
 * PreferenceSearch represents the model behind the search form of `portalium\site\models\Preference`.
 */
class PreferenceSearch extends Preference
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_preference', 'id_user', 'id_setting', 'id_workspace'], 'integer'],
            [['value', 'date_create', 'date_update'], 'safe'],
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
        $query = Preference::find();

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
            'id_preference' => $this->id_preference,
            'id_user' => $this->id_user,
            'id_setting' => $this->id_setting,
            'id_workspace' => $this->id_workspace,
            'date_create' => $this->date_create,
            'date_update' => $this->date_update,
        ]);

        $query->andFilterWhere(['like', 'value', $this->value]);

        return $dataProvider;
    }
}
