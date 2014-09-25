<?php

/* AcmeProsalesBundle:Secured:login.html.twig */
class __TwigTemplate_97e86c8272f9f6f13f94fabef4b9fe2583a299d4e07b60c2604a0b6ebf5e9dad extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Authentification!";
    }

    // line 4
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 5
        echo "    <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acmeprosales/css/login.css"), "html", null, true);
        echo "\" /> 
";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "<form id=\"login-form\" action=\"";
        echo $this->env->getExtension('routing')->getPath("_security_check");
        echo "\" method=\"post\">
<fieldset>

    <legend id=\"login-legend\">Login</legend>

    <label for=\"login\">";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.username", array(), "ProsalesBundle"), "html", null, true);
        echo "</label>
    <input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 14
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
        echo "\"/>
    <div class=\"clear\"></div>

    <label for=\"password\">";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.password", array(), "ProsalesBundle"), "html", null, true);
        echo "</label>
    <input type=\"password\" id=\"password\" name=\"_password\"/>
    <div class=\"clear\"></div>

    <label for=\"remember_me\" style=\"padding: 0;\">";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.remember_me", array(), "ProsalesBundle"), "html", null, true);
        echo "</label>
    <input type=\"checkbox\" id=\"remember_me\" style=\"position: relative; top: 3px; margin: 0; \" name=\"remember_me\" checked/>
    <div class=\"clear\"></div>

    <br />
    <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('form')->renderCsrfToken("authenticate"), "html", null, true);
        echo "\">
    <input type=\"submit\" style=\"margin: -20px 0 0 287px;\" class=\"button\" name=\"commit\" value=\"Se Connecter\"/>\t
</fieldset>
</form>
";
        // line 30
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 31
            echo "    <div class=\"erreur\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "message"), array(), "ProsalesBundle"), "html", null, true);
            echo "</div>
";
        }
    }

    public function getTemplateName()
    {
        return "AcmeProsalesBundle:Secured:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 31,  90 => 30,  83 => 26,  75 => 21,  68 => 17,  62 => 14,  58 => 13,  49 => 8,  46 => 7,  39 => 5,  36 => 4,  30 => 3,);
    }
}
