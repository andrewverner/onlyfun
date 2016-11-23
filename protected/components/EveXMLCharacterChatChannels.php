<?php

/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 24.11.2016
 * Time: 0:07
 */

class EveXMLCharacterChatChannels extends EveXMLApi
{
    
    public $list;
    
    public function __construct($keyID, $vCode, $characterID)
    {
        $this->url = '/char/ChatChannels.xml.aspx';
        
        $this->params = http_build_query([
            'keyID'         => $keyID,
            'vCode'         => $vCode,
            'characterID'   => $characterID
        ]);

        if ($xml = $this->send()) {
            
        }
        else
            return false;
    }

    public function simulate()
    {
        return <<<XML
<result>
    <rowset name="channels" key="channelID" columns="channelID,ownerID,ownerName,displayName,comparisonKey,hasPassword,motd">
        <row channelID="-69329950" ownerID="95578451" ownerName="CCP Tellus" displayName="Players' Haven" comparisonKey="players'haven" hasPassword="False" motd="<b>Feed pineapples to the cats!</b>">
            <rowset name="allowed" key="accessorID" columns="accessorID,accessorName">
                <row accessorID="99005629" accessorName="Tellus Alliance" />
            </rowset>
            <rowset name="blocked" key="accessorID" columns="accessorID,accessorName,untilWhen,reason">
                <row accessorID="98396389" accessorName="Tellus Corporation" untilWhen="0001-01-01 00:00:00" reason="" />
            </rowset>
            <rowset name="muted" key="accessorID" columns="accessorID,accessorName,untilWhen,reason">
                <row accessorID="90006031" accessorName="CCP Nestor" untilWhen="2015-08-07 15:17:40" reason="Test success! You can't speak now." />
            </rowset>
            <rowset name="operators" key="accessorID" columns="accessorID,accessorName">
                <row accessorID="92168909" accessorName="CCP FoxFour" />
                <row accessorID="95465499" accessorName="CCP Bartender" />
            </rowset>
        </row>
    </rowset>
</result>
XML;

    }

}
