<?php

namespace Ketwaroo\Form;

/**
 * Description of AbstractFormElement
 *
 * @author Administrator
 */
abstract class AbstractFormElement
{

    protected $tag, $attributes=[];

    /**
     * `@label @input`
     * 
     * @return string
     */
    protected function getTemplate(){
        return '@label @input';
    }
    
    public function renderLabel($params)
    {
        
        return '<label for=""></label>';
    }
    
    /**
     * 
     * @param array $params
     */
    public function render(array $params = [])
    {
        return strtr($this->getTemplate(), [
            '@label' => $this->renderLabel($params),
            '@input' => $this->renderInput($params),
        ]);
    }

    /**
     * 
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * 
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

/**
 * 
 * @param string $tag
 * @return static
 */
    public function setTag($tag)
    {
        $this->tag = $tag;
        return $this;
    }

    /**
     * 
     * @param array $attributes
     * @return static
     */
    public function setAttributes(array $attributes=[])
    {
        $this->attributes = $attributes;
        return $this;
    }

    
    public function __toString()
    {
        return $this->render();
    }

}
