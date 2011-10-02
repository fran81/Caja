<?php 
class DoublelistHelper extends AppHelper {
    var $helpers = array('Html', 'Form', 'Javascript');
    var $name = ""; //the select box name/id

    /**
     * sets the name. thats important if the doublelist gets build one by one
     * @param string $val
     */
    function setName($val) { $this->name = $val; }

    /**
     * if the doublelist gets build one by one, this function checks if the name is set
     * @return bool
     */
    function checkName() {
        if(empty($this->name)) {
            echo "Please execute setName first!";
            return false;
        }
        return true;
    }

    /**
     * returns a complete doublelist in a table
     * @param string $name      the name of the select box
     * @param array $options    options in the unassociated select box
     * @param array $selected   options in the associated select box
     * @return string
     */
    function create($name, $options=array(), $selected=array()) {
        $this->name = $name;

        foreach($selected as $key => $val) {
            if(isset($options[$key])) unset($options[$key]);
        }

        $ua_select = $this->getUaSelect($options);
        $a_select = $this->getASelect($selected);
        $uaButton = $this->getUaButton();
        $aButton = $this->getAButton();

        $out = '<div class="doublelist">';
        $out .= '<table cellspacing="0" cellpadding="0">';
        $out .= '<tr>';
        $out .= '<td>'.$ua_select.'</td>';
        $out .= '<td>'.$aButton.'<br /><br />'.$uaButton.'</td>';
        $out .= '<td>'.$a_select.'</td>';
        $out .= '</tr>';
        $out .= '</table>';
        $out .= '</div>';
        $out .= $this->getJS();
        return $out;
    }

    /**
     * returns the unassociated select box
     * @param array $options   the options for select
     * @param string $class    the css class for select
     * @return string
     */
    function getUaSelect($options=array(), $class="") {
        if(!$this->checkName()) return false;
        $style = 'width:170px; height:200px;';
        $ua_select = $this->Form->select($this->name.'_ua', $options, array(), array('id' => $this->name.'_ua',
                                                                        'multiple' => true,
                                                                        'style' => $style,
                                                                        'class' => $class),
                                                                    false);
        return $ua_select;
    }

    /**
     * returns the associated select box
     * @param array $options   the options for select
     * @param string $class    the css class for select
     * @return string
     */
    function getASelect($options=array(), $class="") {
        if(!$this->checkName()) return false;
        $style = 'width:150px; height:200px;';
        $a_select = $this->Form->select($this->name, $options, array(), array('id' => $this->name,
                                                                        'multiple' => true,
                                                                        'style' => $style,
                                                                        'class' => $class),
                                                                    false);
        return $a_select;
    }

    /**
     * returns the unassociate button
     * @param string $value   the button value
     * @param array $params
     * @return string
     */
    function getUaButton($value="<<", $params=array()) {
        if(!$this->checkName()) return false;
        if(empty($params['onclick'])) {
            $params['onclick'] = "dl_unassign('".$this->name."_ua', '".$this->name."');";
        }
        $ua_button = $this->Form->button($value, $params);
        return $ua_button;
    }

    /**
     * returns the associate button
     * @param string $value   the button value
     * @param array $params
     * @return string
     */
    function getAButton($value=">>", $params=array()) {
        if(!$this->checkName()) return false;
        if(empty($params['onclick'])) {
            $params['onclick'] = "dl_assign('".$this->name."_ua', '".$this->name."');";
        }
        $a_button = $this->Form->button($value, $params);
        return $a_button;
    }

    /**
     * returns a javascript, to select all options in the associated select box before submit
     * @return string
     */
    function getJS() {
        //"this" is the form. So this script must be within the form
        return $this->Javascript->codeBlock("Event.observe(this, 'submit', function(event){dl_onSubmit('".$this->name."')});");
    }
}
?> 
