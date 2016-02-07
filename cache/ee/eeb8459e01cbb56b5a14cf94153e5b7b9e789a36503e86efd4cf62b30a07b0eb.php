<?php

/* Consultas/tabla.html.twig */
class __TwigTemplate_87b067bbc39410ee64d90e0647c56d483fc552b82d7633337689a515ea84ed59 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<table class=\"tbl\" width=\"400\">

    ";
        // line 3
        if ((twig_length_filter($this->env, (isset($context["consultas"]) ? $context["consultas"] : null)) > 0)) {
            // line 4
            echo "        <tr class=\"tbl-row\">
            ";
            // line 5
            $context["keys"] = twig_get_array_keys_filter($this->getAttribute((isset($context["consultas"]) ? $context["consultas"] : null), 0, array(), "array"));
            // line 6
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(1, (twig_length_filter($this->env, (isset($context["keys"]) ? $context["keys"] : null)) - 1)));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 7
                echo "                <td><b>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["keys"]) ? $context["keys"] : null), $context["i"], array(), "array"), "html", null, true);
                echo "</b></td>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 9
            echo "            <td><b>Cargar</b></td>
            <td><b>Borrar</b></td>
        </tr>

        ";
            // line 13
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["consultas"]) ? $context["consultas"] : null));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["consulta"]) {
                // line 14
                echo "            <tr class=\"";
                echo twig_escape_filter($this->env, twig_cycle(array(0 => "normal", 1 => "alterna"), $this->getAttribute($context["loop"], "index0", array())), "html", null, true);
                echo "\">
                <td>";
                // line 15
                echo twig_escape_filter($this->env, $this->getAttribute($context["consulta"], "Fecha", array(), "array"), "html", null, true);
                echo "</td>
                <td>";
                // line 16
                echo twig_escape_filter($this->env, $this->getAttribute($context["consulta"], "Hora", array(), "array"), "html", null, true);
                echo "</td>
                <td>";
                // line 17
                echo twig_escape_filter($this->env, $this->getAttribute($context["consulta"], "Consulta", array(), "array"), "html", null, true);
                echo "</td>
                <td onclick=\"BtnConCargar('";
                // line 18
                echo twig_escape_filter($this->env, $this->getAttribute($context["consulta"], "ID", array(), "array"), "html", null, true);
                echo "')\"> Cargar </td>
                <td onclick=\"BtnConBorrar(";
                // line 19
                echo twig_escape_filter($this->env, $this->getAttribute($context["consulta"], "ID", array(), "array"), "html", null, true);
                echo ", '";
                echo twig_escape_filter($this->env, $this->getAttribute($context["consulta"], "Consulta", array(), "array"), "html", null, true);
                echo "')\">
                    <img src=\"images/delete.gif\" class=\"Icono\" alt=\"Borrar ";
                // line 20
                echo twig_escape_filter($this->env, $this->getAttribute($context["consulta"], "Consulta", array(), "array"), "html", null, true);
                echo "\" title=\"Borrar ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["consulta"], "Consulta", array(), "array"), "html", null, true);
                echo "\">
                </td>
            </tr>
        ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['consulta'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 24
            echo "

    ";
        }
        // line 27
        echo "
</table>
";
    }

    public function getTemplateName()
    {
        return "Consultas/tabla.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 27,  114 => 24,  94 => 20,  88 => 19,  84 => 18,  80 => 17,  76 => 16,  72 => 15,  67 => 14,  50 => 13,  44 => 9,  35 => 7,  30 => 6,  28 => 5,  25 => 4,  23 => 3,  19 => 1,);
    }
}
/* <table class="tbl" width="400">*/
/* */
/*     {% if consultas|length > 0 %}*/
/*         <tr class="tbl-row">*/
/*             {% set keys = consultas[0]|keys  %}*/
/*             {% for i  in 1..keys|length-1 %}*/
/*                 <td><b>{{ keys[i] }}</b></td>*/
/*             {% endfor %}*/
/*             <td><b>Cargar</b></td>*/
/*             <td><b>Borrar</b></td>*/
/*         </tr>*/
/* */
/*         {% for consulta in consultas %}*/
/*             <tr class="{{ cycle(['normal', 'alterna'], loop.index0) }}">*/
/*                 <td>{{ consulta['Fecha'] }}</td>*/
/*                 <td>{{ consulta['Hora'] }}</td>*/
/*                 <td>{{ consulta['Consulta'] }}</td>*/
/*                 <td onclick="BtnConCargar('{{ consulta['ID'] }}')"> Cargar </td>*/
/*                 <td onclick="BtnConBorrar({{ consulta['ID'] }}, '{{ consulta['Consulta'] }}')">*/
/*                     <img src="images/delete.gif" class="Icono" alt="Borrar {{ consulta['Consulta'] }}" title="Borrar {{ consulta['Consulta'] }}">*/
/*                 </td>*/
/*             </tr>*/
/*         {% endfor %}*/
/* */
/* */
/*     {% endif %}*/
/* */
/* </table>*/
/* */
