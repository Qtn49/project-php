{% extends 'base.html.twig' %}

{% block content %}

    {{ dump(article.etat) }}

<article class="article-container">
    <h1>{{ article["Articletitre_arti"] }}<em>créé le {{ article['Articledate_arti'] }} {% if article["Articledate_modif_arti"] is not empty %} modifié le ( {{ article["Articledate_modif_arti"] }} ){% endif %}</em></h1>
    <p id="texteArti">{{ article["Articletext_arti"] }}</p>

    {% if session is not empty %}

        <a href="" id="editer">éditer</a>

    {% endif %}

    <form action="">
        <input type="submit" value="valider">
    </form>

</article>

{% endblock %}

{% block script %}

{{ parent() }}

<script>

    $("form").hide();

    $("#editer").click((e) => {
        var textArea = $("<textarea></textarea>");
        var textArti = $("#texteArti");
        var textContent = textArti.text();
        textArea.val(textContent);
        textArti.hide();
        $("form").show();
        $("article").append(textArea);

        e.preventDefault();

    });

</script>

{% endblock %}