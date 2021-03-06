<?php

/**
 * This is the model class for table "posts".
 *
 * The followings are the available columns in table 'posts':
 * @property string $id
 * @property string $title
 * @property string $outline
 * @property string $created_at
 * @property string $updated_at
 * @property string $author
 * @property string $category
 * @property string $file
 * @property string $price
 */
class Post extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Post the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'posts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, outline, author', 'required'),
			array('price', 'length', 'max'=>10),
			array('title, author, category', 'length', 'max'=>255),
			array('file, outline, thumbnail, publish', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, outline, created_at, updated_at, author, category, file, price, publish, isDeleted, thumbnail, free', 'safe', 'on'=>'search'),
            array('thumbnail', 'file', 'types' => 'jpg,jpeg,png,gif', 'allowEmpty' => true),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'No.',
			'title' => 'Title',
			'outline' => 'Outline',
			'created_at' => 'Create Time',
			'updated_at' => 'Update Time',
			'author' => 'Author',
            'category' => 'Category',
            'thumbnail' => 'Thumbnail',
			'file' => 'Content',
            'price' => 'Price',
            'publish' => 'Published',
            'free' => 'isFree',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('outline',$this->outline,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('file',$this->file,true);
		$criteria->compare('price',$this->price,true);
        $criteria->compare('publish',$this->publish,true);
        $criteria->compare('thumbnail',$this->thumbnail,true);
        $criteria->compare('free',$this->free,true);
        $criteria->compare('isDeleted',$this->isDeleted,true);
        
        return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
