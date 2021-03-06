<?php

use yii\db\Expression;
use yii\db\Migration;
use yii\db\mysql\Schema;

/**
 * Handles the creation of table `{{%jk_faq}}`.
 */
class m200331_000002_create_jk_faq_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            '{{%jk_faq}}',
            [
                'id' => $this->primaryKey(),
                'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
                'created_by' => Schema::TYPE_INTEGER . ' NOT NULL',
                'updated_at' => Schema::TYPE_INTEGER,
                'updated_by' => Schema::TYPE_INTEGER,
                'deleted_at' => Schema::TYPE_INTEGER,
                'deleted_by' => Schema::TYPE_INTEGER,
                'question' => Schema::TYPE_STRING . ' NOT NULL',
                'answer' => Schema::TYPE_TEXT . ' NOT NULL',
            ]
        );
        $this->execute($this->addData());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%jk_faq}}');
    }

    public function addData()
    {
        $now = strtotime(date('d.m.Y H:i:s'));
        return "INSERT INTO {{%jk_faq}} (`created_at`,`created_by`,`question`,`answer`)
        VALUES 
            ($now,1,
            'Есть ли ограничения по стажу для участия в Жилищной Программе?',
            'Стаж работы в Обществе и/или ДЗО, Стаж работы в Обществе и/или ДЗО, не менее 1 года (на 1 января года подачи заявления).'
            ),
            
            ($now,1,
            'Какие требования к приобретаемому жилью для участия в Жилищной Программе?',
            'Жилое помещение, приобретаемое с использованием помощи, должно находиться не более чем в 50 км от постоянного места работы работника. В отношении работников, не имеющих постоянного места работы, ЖК вправе принять индивидуальное решение.'
            ),
            
            ($now,1,
            'Какую сумму при компенсации процентов я могу получить при участии в Жилищной Программе?',
            'Максимальная сумма компенсации процентов, которую Общество может выплатить работнику – 1 000 000 руб.'
            ),
            
            ($now,1,
            'Есть ли ограничения по возрасту для участия в Жилищной Программе?',
            'Возраст на 1 января года подачи заявления - не менее 21 года и не более пенсионного возраста.'
            ),
            
            ($now,1,
            'Должен быть какой-то определенный банк?',
            'Для получения кредита на улучшение жилищных условий работником может быть выбран любой банк.'
            ),
            
            ($now,1,
            'Какого типа помощь мне может быть предоставлена в рамках Жилищной Программы?', 
            '1) Беспроцентный займ;<br/>2) Компенсация процентов.'
            ),
            
            ($now,1,
            'Может ли мне предоставлен беспроцентный займ и компенсация процентов одновременно?',
            'Да, по решению комиссии'
            ),
            
            ($now,1,
            'Какова корпоративная норма площади жилого помещения на человека?',
            'семья из 1 человека –   35 кв. м;<br>семья из 2 человек – 50 кв.м;<br>семья из 3 человек и более –   20 кв.м на человека.'
            ),
            
            ($now,1,
            'Если у меня (либо члена моей семьи) в собственности есть жилое помещение, но его площадь меньше корпоративной нормы, могу я рассчитывать на участие в Жилищной Программе? А если площадь больше, но жилое помещение является коммунальной квартирой?',
            'Да'
            ),
            
            ($now,1,'Я уверен(-на) что Вам поступает большое кол-во заявок. В каком порядке они рассматриваются, каковы приоритеты?',
            '1) Ключевые работники;<br>2) Переведённые работники;<br>3) Молодые работники;<br>4) Социальные категории работников;<br>5) Все остальные сотрудники.'
            ),
            
            ($now,1,
            'Если я живу с родителями. В количестве членов семьи необходимо их указывать?',
            'Нет. К членам семьи Работника для целей настоящего Положения относятся следующие лица:<br>1) супруг (супруга);<br>2) несовершеннолетние дети Работника, проживающие с Работником;<br>3) несовершеннолетние дети супруга/и Работника, проживающие с Работником;<br>4) дети Работника старше 18 лет, ставшие инвалидами до достижения ими возраста 18 лет;<br>5) дети Работника в возрасте до 23 лет, обучающиеся в образовательных учреждениях по очной форме обучения.'
            ),
            
            ($now,1,
            'В течение какого срока я обязан/обязана вернуть средства, полученные при участии в Жилищной кампании, в случае моего увольнения?',
            'Возврат должен быть произведен в течение 30 дней с момента прекращения трудовых отношений.'
            ),
            
            ($now,1,
            'Я работал(-ла) в компании ОАО \"Центр Телеком\" будет ли этот стаж включен в стаж работы при подаче заявки на участие в Жилищной Программе?',
            'Да, будет включен.<br>Стаж работы в Обществе - все время работы Работника по трудовому договору с Обществом и его правопредшественниками, включая ОАО «ЦентрТелеком», ОАО «Северо-Западный Телеком», ОАО «ВолгаТелеком», ОАО «Южная телекоммуникационная компания», ОАО «Уралсвязьинформ», ОАО «Сибирьтелеком», ОАО «Дальсвязь» и ОАО «Дагсвязьинформ», а также присоединившиеся к указанным акционерным обществам в процессе реорганизации юридические лица.'
            )";
    }
}


