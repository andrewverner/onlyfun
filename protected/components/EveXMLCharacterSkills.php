<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 28.11.16
 * Time: 15:54
 */

class EveXMLCharacterSkills extends EveXMLApi
{

    public $list;
    public $inTraining;
    public $queue;

    public function __construct($keyID, $vCode, $characterID, $simulate = false)
    {
        $this->url = '/char/Skills.xml.aspx';

        $this->params = http_build_query([
            'keyID'         => $keyID,
            'vCode'         => $vCode,
            'characterID'   => $characterID
        ]);
        $this->simulate = $simulate;

        if ($xml = $this->send()) {
            $groups = InvGroups::model()->findAllByAttributes([
                'categoryID' => 16
            ],[
                'order' => 'groupName ASC'
            ]);

            $groupNames = [];
            foreach ($groups as $group) {
                $this->list[$group->groupName] = [];
                $groupNames[$group->groupID] = $group->groupName;
            }

            foreach ($xml->rowset->row as $row) {
                $skill = new EveXMLSkill($row);
                $type = InvTypes::model()->findByAttributes([
                    'typeID' => $skill->typeID
                ]);

                $this->list[$groupNames[$type->groupID]][$skill->typeName] = $skill;
            }

            $this->inTraining = new EveXMLCharacterSkillInTraining($keyID, $vCode, $characterID);
            $this->queue = new EveXMLCharacterSkillQueue($keyID, $vCode, $characterID);
        }
        else
            return false;
    }

}
