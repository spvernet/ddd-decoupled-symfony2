<?php

/* NilPortuguesMyBoundedContextBundle:Default:index.html.twig */
class __TwigTemplate_bbd949955d9cfe746c6d5f0242168c8e0aa3cf9c6151019414988a9a46cf4602 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "NilPortuguesMyBoundedContextBundle:Default:index.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "    <h1>Homepage</h1>

    <h2>Blog users:</h2>
    <p> - Demonstration of a User Aggregate</p>
    <ul>
        <li><a href=\"";
        // line 9
        echo $this->env->getExtension('routing')->getPath("nil_portugues_my_bounded_context_new_user");
        echo "\">
                Create a user with an invalid email.</a>
            <i>(Validation in command bus chain)</i>
        </li>
        <li>
            <a href=\"";
        // line 14
        echo $this->env->getExtension('routing')->getPath("nil_portugues_my_bounded_context_view_user", array("id" => "1"));
        echo "\">
                Load a user with an invalid Id.</a> <i>(Validation in command bus chain)</i></li>
        <li>
            <a href=\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("nil_portugues_my_bounded_context_view_user", array("id" => "1e58fe7d-cfbb-4fa7-b919-7a0ccd940e7d"));
        echo "\">
                Load existing user with a valid Id.</a> <i>Data from repository.</i>
        </li>
        <li>
            <a href=\"";
        // line 21
        echo $this->env->getExtension('routing')->getPath("nil_portugues_my_bounded_context_view_user", array("id" => "00000000-0000-0000-0000-000000000000"));
        echo "\">
                Load a non-existent user with a valid Id (will fail).</a> <i>Exception from repository.</i>
        </li>
    </ul>

    <hr>

    <h2>Blog Posts:</h2>
    <p> - Demonstration of a Post Aggregate</p>
    <ul>
        <li>
            <a href=\"";
        // line 32
        echo $this->env->getExtension('routing')->getPath("nil_portugues_my_bounded_context_view_post", array("id" => "2"));
        echo "\">
                Load a post with an invalid Id.</a> <i>(Validation in command bus chain)</i></li>
        <li>
            <a href=\"";
        // line 35
        echo $this->env->getExtension('routing')->getPath("nil_portugues_my_bounded_context_view_post", array("id" => "2e58fe7d-cfbb-4fa7-b919-7a0ccd940e7d"));
        echo "\">
                Load existing Post with a valid Id.</a> <i>Data from repository.</i>
        </li>
        <li>
            <a href=\"";
        // line 39
        echo $this->env->getExtension('routing')->getPath("nil_portugues_my_bounded_context_view_post", array("id" => "00000000-0000-0000-0000-000000000000"));
        echo "\">
                Load a non-existent Post with a valid Id (will fail).</a> <i>Exception from repository.</i>
        </li>
    </ul>

    <hr>

    <h2>Blog Categories:</h2>
    <p> - Demonstration of a Category Aggregate</p>
    <ul>
    </ul>

    <hr>

    <h2>User Blog Posts With Categories:</h2>
    <p> - Demonstration of an Aggregate Root containing User (root), Posts and Categories</p>
    <ul>
    </ul>
";
    }

    public function getTemplateName()
    {
        return "NilPortuguesMyBoundedContextBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 39,  79 => 35,  73 => 32,  59 => 21,  52 => 17,  46 => 14,  38 => 9,  31 => 4,  28 => 3,  11 => 1,);
    }
}
