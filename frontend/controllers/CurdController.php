<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\db\Query;
use backend\models\Goods;

class CurdController extends Controller{
    
    /**
     * 原生查询SQL  DAO
     */
    public function actionRaw(){
        // 返回多行. 每行都是列名和值的关联数组.
        // 如果该查询没有结果则返回空数组
        
        $posts = Yii::$app->db->createCommand('SELECT * FROM csc_goods')->queryAll();
        
        // 返回一行 (第一行)
        // 如果该查询没有结果则返回 false
        $post = Yii::$app->db->createCommand('SELECT * FROM csc_goods WHERE id=25')
                   ->queryOne();
        
//        show($post);exit;

        // 返回一列 (第一列)
        // 如果该查询没有结果则返回空数组
        $titles = Yii::$app->db->createCommand('SELECT goods_name FROM csc_goods')
                     ->queryColumn();

//        show($titles);exit;
        
        // 返回一个标量值
        // 如果该查询没有结果则返回 false
        $count = Yii::$app->db->createCommand('SELECT COUNT(*) FROM csc_goods')
                     ->queryScalar();
        
//        show($count);exit;
        
        // 清空一张表
//        Yii::$app->db->createCommand()->truncateTable('csc_article')->execute();
        
    }
    
    /**
     * 参数绑定
     */
    public function actionBind(){
        
        # 优点一 有效方式SQL注入攻击
        $_GET['id'] = 25;
        
        $post = Yii::$app->db->createCommand('SELECT * FROM csc_goods WHERE id=:id AND is_add=:is_add')
           ->bindValue(':id', $_GET['id'])
           ->bindValue(':is_add', 1)
           ->queryOne();
        
        $post2 = Yii::$app->db->createCommand('SELECT * FROM csc_goods WHERE id=:id AND is_add=:is_add', 
                [':id'=>$_GET['id'], ':is_add' => 1])
           ->queryOne();
        
        $post3 = Yii::$app->db->createCommand('SELECT * FROM csc_goods WHERE id=:id AND is_add=:is_add')
           ->bindValues([
               ':id' => 25,
               ':is_add' => 1
           ])
           ->queryOne();
        
//        show($post3);
        
        
        # 优点二 使用预处理大大提高查询效率
        $command = Yii::$app->db->createCommand('SELECT * FROM csc_goods WHERE id=:id');
        $post4 = $command->bindValue(':id', 25)->queryOne();
        $post5 = $command->bindValue(':id', 26)->queryOne();
//        show($post4);
//        show($post5);
//        exit;
        
        
        //  bindParam() 支持通过引用来绑定参数， 上述代码也可以像下面这样写：
        
        $command = Yii::$app->db->createCommand('SELECT * FROM csc_goods WHERE id=:id')
              ->bindParam(':id', $id);

        $id = 25;
        $post6 = $command->queryOne();

        $id = 26;
        $post7 = $command->queryOne();
        
        show($post6);
    }
    
    
    public function actionExecute(){
        
        Yii::$app->db->createCommand('UPDATE post SET status=1 WHERE id=1')->execute(); // 返回执行 SQL 所影响到的行数
        
        
        // INSERT (table name, column values)
        Yii::$app->db->createCommand()->insert('user', [
            'name' => 'Sam',
            'age' => 30,
        ])->execute();

        // UPDATE (table name, column values, condition)
        Yii::$app->db->createCommand()->update('user', ['status' => 1], 'age > 30')->execute();

        // DELETE (table name, condition)
        Yii::$app->db->createCommand()->delete('user', 'status = 0')->execute();
        
        
        //调用 batchInsert() 来一次插入多行， 这比一次插入一行要高效得多
        // table name, column names, column values
        Yii::$app->db->createCommand()->batchInsert('user', ['name', 'age'], [
            ['Tom', 30],
            ['Jane', 20],
            ['Linda', 25],
        ])->execute();
    }
    
    
    public function actionOper(){
        
//        createTable()：创建一张表
//        renameTable()：重命名一张表
//        dropTable()：删除一张表
//        truncateTable()：删除一张表中的所有行
//        addColumn()：增加一列
//        renameColumn()：重命名一列
//        dropColumn()：删除一列
//        alterColumn()：修改一列
//        addPrimaryKey()：增加主键
//        dropPrimaryKey()：删除主键
//        addForeignKey()：增加一个外键
//        dropForeignKey()：删除一个外键
//        createIndex()：增加一个索引
//        dropIndex()：删除一个索引
        
        $table = Yii::$app->db->getTableSchema('csc_goods');
        show($table);
    }

    /**
     *  事务处理
     */
    public function actionTransaction(){
        
        Yii::$app->db->transaction(function($db) {
            $db->createCommand($sql1)->execute();
            $db->createCommand($sql2)->execute();
            // ... executing other SQL statements ...
        });

        $db = Yii::$app->db;
        $transaction = $db->beginTransaction();

        try {
            $db->createCommand($sql1)->execute();
            $db->createCommand($sql2)->execute();
            // ... executing other SQL statements ...

            $transaction->commit();

        } catch(\Exception $e) {

            $transaction->rollBack();

            throw $e;
        }
    }
    
    /**
     * 查询构造器
     */
    public function actionQuery(){
        $query = new Query();
//        $row = $query->select(['id', 'goods_name', 'price'])
//                ->from('csc_goods')->where('id=25')->one();
//        show($row);
//        exit;
        
        $rows = $query->select(['id', 'goods_name', 'price'])
                ->limit(5)
                ->offset(1)
                ->from('csc_goods')->all();
//        show($rows);
        
        
        $query2 = (new Query())->select('u.id as uid, u.user,u.phone, ui.sex, ui.tname')->from('csc_user u')
                ->leftJoin('csc_user_info ui', 'u.id=ui.user_id')
                ->limit(3)
                ->indexBy('uid')
                ->all();
        
//        show($query2);
        
        
        $query3 = (new Query())->select('id, goods_name, cate_id, price, stock')->from('csc_goods')
                ->where(['id' => [20,26,25]])
                ->all();
        
//        show($query3);
        
        // 此例终结
        
        $query4 = (new Query())->select('id, goods_name, cate_id, price, stock')->from('csc_goods')
                ->where(['and', 'price > 1', 'srock >0'])
                ->all();
        
        $query4 = (new Query())->select('id, goods_name, cate_id, price, stock')->from('csc_goods')
                ->where(['and', 'price > 1', ['in', 'id', [25, 26, 27, 28]]])
                ->all();
        
        $query4 = (new Query())->select('id, goods_name, cate_id, price, stock')->from('csc_goods')
                ->where(['and', 'price > 1', ['id' => [25, 26, 27, 28]]])
                ->all();
        
        show($query4);
        exit;
    }
    
    /**
     * AR 使用
     */
    public function actionAr(){
        
        $goods = Goods::find()->where(['id'=>25])->one();
        $allGoods = Goods::find()->where('price >20')->all();
        $goods = Goods::findBySql("select * from csc_goods where price>:price", [':price'=>50])->all();
        
        # 注意    findOne 和 findAll 参数形式不支持操作符格式
        
        $data = Goods::findOne(25);// 正确
        $data2 = Goods::findOne(['id'=>[25, 28], 'brand_id'=>0]);// 正确
        $data3 = Goods::findAll(['id'=>[25, 28], 'brand_id'=>[0, 16]]);// 正确
        $data4 = Goods::find(['>', 'id', 5]); // 错误的格式
        $data5 = Goods::findAll([25, 28]);  // 正确
        
        $data6 = \yii\helpers\ArrayHelper::toArray($data5);
        show($data6);
        exit;
        
    }
    
}
