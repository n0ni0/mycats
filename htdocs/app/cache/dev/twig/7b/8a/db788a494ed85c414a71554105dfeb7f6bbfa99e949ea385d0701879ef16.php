<?php

/* ::base.html.twig */
class __TwigTemplate_7b8adb788a494ed85c414a71554105dfeb7f6bbfa99e949ea385d0701879ef16 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
  <meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />

  <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo " | mycats</title>
  ";
        // line 7
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 8
        echo "</head>

<body><div id=\"container\">
  ";
        // line 11
        $this->displayBlock('body', $context, $blocks);
        // line 12
        echo "
<footer>
  &copy; ";
        // line 14
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo " - mycats
  <a href=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("contact");
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("contact"), "html", null, true);
        echo "</a>
  <a href=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("privacy");
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("privacy"), "html", null, true);
        echo "</a>
</footer>

";
        // line 19
        $this->displayBlock('javascripts', $context, $blocks);
        // line 20
        echo "</div></body>
</html>
";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
    }

    // line 7
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
    }

    // line 19
    public function block_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 19,  83 => 11,  78 => 7,  73 => 6,  67 => 20,  65 => 19,  57 => 16,  51 => 15,  47 => 14,  43 => 12,  41 => 11,  36 => 8,  34 => 7,  30 => 6,  23 => 1,);
    }
}
