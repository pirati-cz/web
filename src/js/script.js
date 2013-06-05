var initPirateVideos = null;
var initCrmapTimeout = null;

$(document).ready(function(){
     // init tz
     initTz();

     // init youtube
     initYoutube();

     // init events
     initEvents();

     // cr map
     initCrmap();

     // init sharing
     //initSharing();
});

function initSharing(){
     var share = false;
     $('a[href="#sharing"]').click(function(){
          var s = $('#sharing');
          if(share){
               
          } else {
               s.css('display','inline-block');
//               alert($('#share').width());
//               s.show();

               s.css('width','0px');
          }
          share = !share;
     });
}

function initCrmap(){

     $('.crmap').mouseenter(function(){
          clearTimeout(initCrmapTimeout);
          $(this).popover({
               trigger: 'manual',
               placement: 'bottom',
               container: 'body',
               html: true,
               delay: { hide: 5000 },
               title: 'Rychlá volba regionu',
               content: function(){
                    return '<div id="crmap"></div>';
                    //return initSVGMap();
               }
          });
          $(this).popover('show');
          initSVGMap();
     });
     $('.crmap').mouseleave(function(){ initCrmapTimeout = setTimeout('killmap()',5000); });
     $(document).click(function(){ $('.crmap').popover('destroy'); });
}

function killmap(){
     $('.crmap').popover('destroy');
}

function initSVGMap(){
//     alert($('#crmap').position());

     var r = Raphael("crmap", 250, 178);
     var attr = {
          fill: "#fff",
          stroke: "#222",
          "stroke-width": 1,
          "stroke-linejoin": "round"
     };
     var aus = {};
     var scalex = 1.30;
     var scaley = 1.30;
     
     aus.praha = r.path("M63.985,65.103l1.666-0.833l0.635,0.357c0,0,0.993,0.191,1.111,0.08c0.118-0.112-0.278-1.032-0.278-1.032l0.714-0.437l0.992,0.198l1.111-0.595l0.595-0.793l1.31,0.04l0.317,0.555l0.753,0.238l0.238,0.357l0.873-0.198l-0.238,0.873l1.15,0.277l0.516,0.833h0.754l0.714,0.912l-0.119,0.714l-1.151,0.119l-0.793,0.556l0.556,0.476l0.119,1.229l-0.833,0.754l-0.953-0.635l-1.229-0.159l-0.595,0.595l-1.111,0.278l-0.634,0.913l-0.873,0.039l-0.833,0.397l-0.238,0.635l-1.071,0.238l-0.794-0.873l0.397-1.27l-1.111-0.556l0.317-0.714l-0.913-0.595l-0.714-1.031l0.555-0.833L63.985,65.103z").scale(scalex,scaley,0,0).attr(attr);
     aus.karlovarsko = r.path("M19.546,72.884l-1.693-0.069v-1.229l-1.229-0.582l0.064-1.423l-3.622-2.458l-2.263-1.164l-0.97-1.746l-0.97-1.099l0.453-2.005l-1.487-2.263l-1.067-1.067l0.744-1.455l-0.646-1.617h2.069l0.518,0.518v1.422h1.1l0.614,0.614l-0.356,1.002l0.646,0.647v1.617l0.971,0.97l0.452-2.328c0,0-0.323-0.776,0-1.1s1.293-1.293,1.293-1.293l0.582-1.94l2.522-1.358v-0.905l0.809-0.809l1.843-0.291l2.328-0.388l0.776,0.776l1.293-1.617l2.394-0.647l2.521,1.875l1.153,1.153h2.384l1.166,0.44c0,0-0.061,1.003,0,1.121c0.062,0.118,2.556-0.269,2.556-0.269l1.121,1.121l-1.099,1.099l0.605,1.143l-0.403,1.48l0.987,0.986L37.3,60.599l1.121,1.524L37.3,63.244l1.659,1.659l-0.807,1.973l-1.345,0.359v2.017l-1.793-1.345l-1.883-0.224l-3.586,2.331v1.345l-0.919,0.919l-1.502-0.74l-0.762,0.359l-1.479-0.896l-1.793,0.762l-1.277,1.278l-1.188-1.054L19.546,72.884z").scale(scalex,scaley,0,0).attr(attr);
     aus.plzensko = r.path("M38.959,64.903l-0.807,1.973l-1.345,0.359v2.017l-1.793-1.345l-1.883-0.224l-3.586,2.331v1.345l-0.919,0.919l-1.502-0.74l-0.762,0.359l-1.479-0.896l-1.793,0.762l-1.277,1.278l-1.188-1.054l-1.076,0.897l-1.693-0.069l-1.875,2.846l-0.114,1.701l-1.956,1.791l1.487,1.682l1.811,1.229l-0.129,1.875l1.229,1.424l-0.065,1.745l1.94,1.358l-0.194,2.134l0.323,1.487l1.552,0.841l1.358,1.423l1.035,1.746l1.875,0.517l0.647-0.452l1.681,0.324l2.134,1.552l0.259,1.745l1.875,1.876v0.905l1.746,1.358l0.323,1.357l1.164,0.842h1.617l1.552,1.552l1.422,2.068l0.194,2.265l2.651,1.745l0.911-1.517l0.018-0.899l0.399-1.422l1.25-0.535l0.297-0.834l-0.595-0.951l0.298-2.321l1.071,0.356l0.357-0.654l1.428-0.535l0.595-1.429l-0.714-1.428l1.13-0.596l-0.893-1.011l0.714-0.654v-0.893l0.833-0.655l1.071-1.666l-0.833-1.369l0.179-1.844v-1.072l-0.357-1.309l0.655-0.952l-0.773-1.309l0.06-1.428l0.297-1.072l-0.773-0.595l-0.833-1.071l0.417-1.19l-0.953-1.012l1.25-0.894h1.309l1.131-1.367l-0.536-1.071l0.595-1.012l-0.536-1.429l1.131-1.13l-0.297-0.893l0.119-1.547l-1.012-0.654l-1.19-0.238l-0.06-0.953l-1.19,0.238c0,0-1.204-1.596-1.25-1.606c-0.046-0.011-1.071,0.417-1.071,0.417l-1.071-0.536l-0.953-0.536l-0.178-1.011l-1.607-0.119l-0.952,0.595l-0.833-0.774l0.655-0.833l-0.546-0.687l-1.614-0.941H38.959z").scale(scalex,scaley,0,0).attr(attr);
     aus.liberecko = r.path("M98.496,36.6l1.439,1.626l-0.449,1.883l0.763,1.838l-0.358,0.986l0.896,0.896l-0.718,1.435l1.346,1.345v0.852l-2.286,0.493l-1.077-1.076l-1.39,0.896v1.21l-1.166,0.673l-0.762-1.166l-2.601-0.897l-1.704,1.121l-1.883-1.211l-1.211-0.538v-0.897l-1.692-0.863l-0.773-0.773h-1.322l-1.009-1.009l-0.987,1.704l-1.569,1.749l-0.538-0.538l-1.345,0.224v1.121l-1.883,1.524l-2.242,0.538l-0.538-1.614l-2.601,0.134l-1.21-1.479l-1.704-2.824v-1.21l-0.807-1.3l0.953-1.603l0.998-0.998v-0.919l1.144-1.144l-0.359-1.435l1.704,0.224l1.524,0.583l0.225-1.749l1.523-0.532l4.01,1.229l1.293-1.875l2.393-0.129c0,0,1.574,0.292,1.682,0.194c0.107-0.099,0.388-2.264,0.388-2.264l0.517-2.07l-1.1-1.099l1.035-1.035h1.746l0.906,0.841l1.422-0.776l0.776,1.358l1.164-0.518l1.294,1.552l-0.583,1.293l0.647,2.004l1.131,1.132l1.067,1.067l0.129,1.875l0.42,0.42l1.456-1.326L98.496,36.6z").scale(scalex,scaley,0,0).attr(attr);
     aus.pardubicko = r.path("M135.293,60.139l-0.414,1.949l-1.111,2.143l-0.357,2.062l0.595,0.992l-2.379,1.944v1.349l0.595,1.389l0.237,1.746l0.575,0.575l-1.329,0.893l0.992,1.943l1.071,2.104v1.07l1.349,0.595v1.786l-1.229,1.229v1.349l-0.754,1.071l-1.468-1.468h-4.404l-0.872,1.428h-2.937l-0.773,0.773l-1.726-1.726l-1.388-0.039l-1.707-2.022l-3.331-0.755l-0.596-1.388l-1.588,0.039v-0.873l-1.625,1.032v1.349l-1.826-0.635l-0.912-0.477v-1.189l-1.229-0.635l-0.952-0.198l-0.991-1.032l-1.667-1.07l-2.301,0.039l-2.143-1.666l-0.477-1.944l0.873-0.873l0.119-1.825l-1.626-0.793l-0.04-1.111l-1.309-0.437l-1.349-0.793l0.198-1.111l0.813-1.173l2.074-0.463l2.364-2.048l1.255,0.718c0,0,2.174,0.078,2.287,0c0.113-0.079,1.211-1.659,1.211-1.659h1.166v1.345l0.829,0.292l0.784-0.785l1.525-0.762l1.838,0.045l0.807,0.807v1.57h1.076l0.986,0.986l1.727,1.009l1.008,1.009l1.57-0.448h2.241l0.402-1.704l1.257-1.255l2.376-0.673v-1.3h0.94l1.999,0.895l2.948,1.658l1.681-1.681l0.874-0.874l-0.032-1.52L135.293,60.139z").scale(scalex,scaley,0,0).attr(attr);
     aus.vysocina = r.path("M122.679,87.061l-1.726-1.726l-1.388-0.039l-1.707-2.022l-3.331-0.755l-0.596-1.388l-1.588,0.039v-0.873l-1.625,1.032c0,0,0.055,1.304,0,1.349c-0.055,0.044-1.826-0.635-1.826-0.635l-0.912-0.477v-1.189l-1.229-0.635l-0.952-0.198l-0.991-1.032l-1.667-1.07l-2.301,0.039l-2.143-1.666l-1.428,0.119l-0.952,0.773l0.119,1.428l-1.369-0.06l-0.476,1.012h-1.369l-0.773,0.714l-0.952-0.238l-0.714,0.418l-0.178,0.952l-0.893,0.832l-0.06,1.369l1.845,0.894c0,0,0.067,1.098,0.059,1.249c-0.007,0.15-1.13,0.774-1.13,0.774l-0.893-0.418l-0.536,0.952l-1.071-0.179l-1.547,0.061l-1.964-0.298l-1.309,1.31l-0.06,1.248l-0.655,0.655l0.417,1.547l-0.059,1.666l-0.714,0.894v1.845l0.654,1.369l-0.297,1.07l0.655,1.189l1.309,1.071l1.131-0.654l1.488,0.833l0.654,1.19l1.309,1.19l1.19-0.654l1.904,0.713l1.726-0.297l0.773,1.07l-0.238,1.311l1.547,1.547l2.023,0.06l1.666-0.357l1.727,1.369l-0.18,1.07l-1.25,0.238l-0.237,1.488l-1.31,1.368l1.071,0.952l0.952,1.487l1.071-0.534l1.071,0.773l1.309-1.369l1.369,1.012l0.714-1.369l0.833-0.237l0.773-1.072h1.428l0.536-1.249l1.666-0.714l1.487,1.012l1.012-0.596l1.369,0.417l1.31-0.654l0.714-1.132l1.131,0.298l0.534-1.309l0.894-0.238l0.417-0.774l-1.071-0.773l-0.357-1.189l1.368-0.834l-1.25-1.249l0.299-1.071l0.951-0.773l-0.892-1.13l1.07-0.715l0.417-0.952l2.321-1.071l-0.12-2.142l-0.476-1.19L122.739,92l-0.655-1.547l1.19-0.714l0.356-0.714l-1.249-0.833L122.679,87.061z").scale(scalex,scaley,0,0).attr(attr);
     aus.zlinsko = r.path("M178.557,93.057l-1.368-0.64l-0.298-1.369l-1.666-1.071l-0.119-1.071l-1.31,0.537h-1.249l-1.429-1.013l-1.904-0.416l-1.903,0.773l-1.19-1.012h-1.37l-0.981,0.982l-0.981-0.328l-1.606,1.07v1.667c0,0-1.032,1.102-1.28,1.28c-0.246,0.178-1.397-1.577-1.397-1.577l-1.845,0.653l0.535,1.607l-1.606,0.477l-1.19-0.357l-0.981,0.981l-0.685,1.221l-0.922-0.923l-1.578,0.089l-0.476-1.13l-0.952,0.833l0.536,1.844l-0.893,0.894l-0.536,0.833l-2.261,0.357l-1.399,1.397l-0.862,1.16l0.715,1.25l-0.357,1.25l1.607,0.179l-0.18,1.189l-1.07,0.715l-1.19,1.249l0.893,1.131l1.964-0.773l0.714,0.773l-0.179,1.369l1.488,0.833l1.963,0.238l-0.059,1.369l1.249-0.061l1.309,1.19l1.548-0.596l1.368,0.834l0.061,0.952l1.486,0.356l0.894,1.31l0.511,0.643h1.164l1.682-1.034l1.164-2.006l2.392-0.129l0.422-3.201l0.938-0.938l3.104-0.259l1.617-2.328v-2.781l0.841-2.392v-1.683l1.293-2.004l1.746-0.453l1.617-0.841l1.423-0.518L178.557,93.057z").scale(scalex,scaley,0,0).attr(attr);
     aus.moravskoslezsko = r.path("M150.037,57.165v2.464h-1.175l-1.07,1.071l-2.382,1.547v1.667l-0.832,0.833l0.654,1.19l-1.428,2.023l-0.417,1.844l0.982,0.982l-0.923,1.517l-0.297,1.786l0.862,0.862h1.101v1.279h1.488l0.952,0.953l1.725-0.477l1.429,2.082h1.19l1.012,0.536l1.189-0.833l1.013,1.012l1.309-0.715l1.786,0.953l-0.418,2.022h1.846l0.654,1.786l1.428,0.477l1.22,1.219l-0.148,1.221h1.31l0.653,1.309h1.37l1.19,1.012l1.903-0.773l1.904,0.416l1.429,1.013h1.249l1.31-0.537l0.119,1.071l1.666,1.071l0.298,1.369l1.368,0.64l1.101-0.389l2.068-2.716l-0.129-1.552l1.423-0.646l1.163,0.581l1.94-0.388l1.617,0.518l2.069-0.97l0.323-1.552l-1.164-3.17l-0.711-2.199h-1.683l-0.71-0.84l-2.135-0.646l-0.323-1.553l-1.423-3.104l0.776-1.681l-0.646-0.259l-0.647-1.811l-1.293,0.97l-2.522-1.423l-2.199-0.323l-0.775,1.358l-1.164-1.94l-1.488-0.711l-0.711-0.905l-1.293,0.841l-1.293-0.582l0.097-1.584l-1.067-1.067l-1.552,0.258l-0.776,2.005c0,0-1.317,1.413-1.487,1.487c-0.17,0.075-1.39-0.032-1.39-0.032l-1.326-1.326l-1.358-0.453l-0.711-2.134l-1.229-1.746l-1.39,0.162l-1.326-1.326v-1.1l2.328-0.711l1.844-0.906v-1.067l-1.196-1.196l0.258-1.294l-1.293-1.293l-0.647,1.293l-0.97,0.97l-3.232-0.259L150.037,57.165z").scale(scalex,scaley,0,0).attr(attr);
     aus.jiznicechy = r.path("M44.308,112.233l1.428,0.416l1.456,1.27l-0.238,0.736l1.034,1.552l1.811,0.324l0.518,1.616l1.229,1.617l0.517,1.487l1.358,0.065l2.328,2.198l1.229,0.452l1.358,1.617l-0.97,1.035l2.134,2.134h2.458l2.458,0.452l2.004,1.165l2.846-2.394l0.582-1.487l1.487,1.293l1.617,0.324l1.293-0.324l2.134,1.423l0.84-1.357l-0.258-1.294l0.258-2.198l1.811-1.487l0.647-1.876l1.681,0.065l2.328,0.711l0.388-0.711l-0.582-1.035l0.323-1.422l0.583-1.747l-0.194-2.264l-0.13-2.393l0.711-1.357l2.134,0.711l1.811,0.388l0.583,1.94l2.781-0.646l0.776-1.035l1.875,0.064l2.845,1.487l0.971,0.453l0.971,1.422l0.773-1.667l-0.952-1.487l-1.071-0.952l1.31-1.368l0.237-1.488l1.25-0.238l0.18-1.07l-1.727-1.369l-1.666,0.357l-2.023-0.06l-1.547-1.547l0.238-1.311l-0.773-1.07l-1.726,0.297l-1.904-0.713l-1.19,0.654l-1.309-1.19l-0.654-1.19l-1.488-0.833l-1.131,0.654l-1.309-1.071l-0.655-1.189l0.297-1.07l-0.654-1.369v-1.845l0.714-0.894l0.059-1.666l-0.417-1.547l-0.773-1.13l-0.536-1.31l-1.012,0.118l-1.844-1.547l-1.25,0.893l0.357,1.846l-1.547,0.832l-0.833,0.953l-1.726-0.715l-1.904-0.476l-1.071,0.179l-1.547-0.715l-1.488,0.893c0,0-0.868-0.056-1.011-0.059c-0.144-0.004-0.953-1.191-0.953-1.191h-1.428l-0.714,0.894l-3.213,0.356l-0.893-0.951h-1.13l-0.655,1.13l-1.666,0.834l-1.071-0.536l-3.273-0.119l-0.655,0.952l0.357,1.309v1.072l-0.179,1.844l0.833,1.369l-1.071,1.666l-0.833,0.655v0.893l-0.714,0.654l0.893,1.011l-1.13,0.596l0.714,1.428l-0.595,1.429l-1.428,0.535l-0.357,0.654l-1.071-0.356l-0.298,2.321l0.595,0.951l-0.297,0.834l-1.25,0.535l-0.399,1.422L44.308,112.233z").scale(scalex,scaley,0,0).attr(attr);
     aus.ustecko = r.path("M29.234,51.474l2.264-1.229l-0.064-1.747l0.776-0.776l2.328-0.388l1.94,0.259l0.776-1.423v-1.035l0.646-1.164h0.776l0.387,1.164l0.97-0.323V43.39l0.615-0.615l0.356-0.938h0.905l0.388,1.229l1.035,0.647l2.005-1.423l0.129-2.393l0.938-0.938l1.067,0.55l1.294-1.164l0.84,0.841l1.552-0.841l1.746-0.194l0.388,0.906h0.711l1.164-1.164v-1.811l1.487-0.259l1.035-1.035l1.358,0.841l2.069-1.099l0.841-0.841l1.746,0.129l0.841-1.681h1.164l0.453,0.517l2.328-0.841l0.259-1.617l-1.94-0.646v-1.229l-1.94-0.388l0.711-1.294l0.646-1.681l1.94,0.905l0.453,0.453h1.164l1.811-0.647l1.164,1.164l1.164,1.1l0.064,1.423l-0.97,1.617l2.199-0.388l-0.388,2.263v1.035l-1.523,0.532l-0.225,1.749l-1.524-0.583l-1.704-0.224l0.359,1.435l-1.144,1.144v0.919l-0.998,0.998c0,0-0.969,1.353-0.953,1.603s0.807,1.3,0.807,1.3v1.21l1.704,2.824l1.21,1.479l-0.538,0.718l0.224,1.704h-1.121l-0.359,1.076h-1.166l0.403,2.018l-0.852,0.852l-1.928-0.179l-1.031,1.031H60.57l-1.883-0.852l-1.524,0.807v1.076l-1.233,1.233h-1.412l-0.482,0.482l0.034,0.93l-1.345-0.807l-1.479,1.479l-2.063-0.044l-1.972,1.21l-1.749,0.089l-1.345,1.256l-0.269,1.569l-1.479,0.628l-0.807,1.3l-1.614-0.941h-0.987L37.3,63.244l1.121-1.121L37.3,60.599l0.404-0.852l-0.987-0.986l0.403-1.48l-0.605-1.143l1.099-1.099l-1.121-1.121l-2.556,0.269v-1.121l-1.166-0.44h-2.384L29.234,51.474z").scale(scalex,scaley,0,0).attr(attr);
     aus.olomoucko = r.path("M150.037,57.165v2.464h-1.175l-1.07,1.071l-2.382,1.547v1.667l-0.832,0.833l0.654,1.19l-1.428,2.023l-0.417,1.844l0.982,0.982l-0.923,1.517l-0.297,1.786l0.862,0.862h1.101v1.279h1.488l0.952,0.953l1.725-0.477l1.429,2.082h1.19l1.012,0.536l1.189-0.833l1.013,1.012l1.309-0.715l1.786,0.953l-0.418,2.022h1.846l0.654,1.786l1.428,0.477l1.22,1.219l-0.148,1.221h1.31l0.653,1.309l-0.981,0.982l-0.981-0.328l-1.606,1.07v1.667l-1.28,1.28l-1.397-1.577l-1.845,0.653l0.535,1.607l-1.606,0.477l-1.19-0.357l-0.981,0.981l-0.685,1.221l-0.922-0.923l-1.578,0.089l-0.476-1.13l-0.952,0.833l0.536,1.844l-0.893,0.894l-0.536,0.833l-2.261,0.357l-1.399,1.397l-0.921-1.576v-0.893l-0.745-0.744h-1.636l-0.237-1.279v-1.19l-1.429-0.893V92l-0.923-0.922l-0.565-1.22h-1.309l-0.893,1.012l0.951,0.951l0.982,0.982l-1.041,1.518l-0.715,0.714l-1.785-1.31l0.834-0.832l-1.071-1.429v-1.547l1.189-1.25l-1.368-0.416l-1.131-0.06l0.694-1.865l0.754-1.071v-1.349l1.229-1.229v-1.786l-1.349-0.595v-1.07l-1.071-2.104l-0.992-1.943l1.329-0.893l-0.575-0.575l-0.237-1.746l-0.595-1.389v-1.349c0,0,2.353-1.883,2.379-1.944c0.027-0.061-0.595-0.992-0.595-0.992l0.357-2.062l1.111-2.143l0.414-1.949l2.069-0.97h1.617l0.064-2.005l-1.067-1.067l-1.067-0.42l-0.775-2.781l-1.682-0.905l0.905-1.746l2.005,0.517l1.487,0.323l2.457,0.711l1.003,1.002l1.714-0.55l0.26,1.682l1.356,1.035h2.069l0.519,1.811L150.037,57.165z").scale(scalex,scaley,0,0).attr(attr);
     aus.jiznimorava = r.path("M133.133,86.327l-1.468-1.468h-4.404l-0.872,1.428h-2.937l-0.773,0.773l-0.297,1.132l1.249,0.833l-0.356,0.714l-1.19,0.714L122.739,92l-0.536,1.131l0.476,1.19l0.12,2.142l-2.321,1.071l-0.417,0.952l-1.07,0.715l0.892,1.13l-0.951,0.773l-0.299,1.071l1.25,1.249l-1.368,0.834l0.357,1.189c0,0,1.04,0.616,1.071,0.773c0.03,0.159-0.417,0.774-0.417,0.774l-0.894,0.238l-0.534,1.309l-1.131-0.298l-0.714,1.132l-1.31,0.654l-1.369-0.417l-1.012,0.596l-1.487-1.012l-1.666,0.714l-0.536,1.249h-1.428l-0.773,1.072l-0.833,0.237l-0.714,1.369l-1.369-1.012l-1.309,1.369l-1.071-0.773l-1.071,0.534l-0.773,1.667l0.84,0.131l1.682,0.193l1.939,1.424l1.941,0.193l0.452-0.776l1.939,0.194l2.846,2.005l0.323,1.034l3.751,2.069l4.462-0.063l3.428,0.646l1.293-1.488l0.712-1.938l2.393-0.13l1.035,1.1l2.392,0.388l0.324,1.617l1.229-0.389l2.135,1.294l1.939-0.518l1.294,0.841l0.646,3.233l1.035-0.13l0.775-2.716l0.518-1.875l2.135-2.651l0.517-1.812l0.776-0.323l1.164-1.164h1.229l2.393,1.035l2.069,1.229l2.07-1.359l1.745,1.164l1.552-0.387l1.617-1.488l-0.511-0.643l-0.894-1.31l-1.486-0.356l-0.061-0.952l-1.368-0.834l-1.548,0.596l-1.309-1.19l-1.249,0.061l0.059-1.369l-1.963-0.238l-1.488-0.833l0.179-1.369l-0.714-0.773l-1.964,0.773l-0.893-1.131l1.19-1.249l1.07-0.715l0.18-1.189l-1.607-0.179l0.357-1.25l-0.715-1.25l0.862-1.16l-0.921-1.576v-0.893l-0.745-0.744h-1.636l-0.237-1.279v-1.19l-1.429-0.893V92l-0.923-0.922l-0.565-1.22h-1.309l-0.893,1.012l0.951,0.951l0.982,0.982l-1.041,1.518l-0.715,0.714l-1.785-1.31l0.834-0.832l-1.071-1.429v-1.547l1.189-1.25l-1.368-0.416l-1.131-0.06L133.133,86.327z").scale(scalex,scaley,0,0).attr(attr);
     aus.strednicechy = r.path("M99.213,71.173l-1.626-0.793l-0.04-1.111l-1.309-0.437l-1.349-0.793l0.198-1.111l0.813-1.173l0.494-1.614l-1.929-1.031l0.941-1.659l-0.493-1.076l0.27-1.345l-0.314-1.435l-0.717-0.717l-1.3,0.852l-2.107-0.27v-1.255l-1.144-1.144L88.1,54.77l-0.314-1.121l1.143-1.144l-0.695-1.905l0.404-1.121l-0.672-1.076l0.582-0.897l-1.211-0.538v-0.897l-1.692-0.863l-0.773-0.773h-1.322l-1.009-1.009l-0.987,1.704l-1.569,1.749l-0.538-0.538l-1.345,0.224v1.121l-1.883,1.524l-2.242,0.538l-0.538-1.614l-2.601,0.134l-0.538,0.718l0.224,1.704h-1.121l-0.359,1.076h-1.166l0.403,2.018l-0.852,0.852l-1.928-0.179l-1.031,1.031H60.57l-1.883-0.852l-1.524,0.807v1.076l-1.233,1.233h-1.412l-0.482,0.482l0.034,0.93l-1.345-0.807l-1.479,1.479l-2.063-0.044l-1.972,1.21l-1.749,0.089l-1.345,1.256l-0.269,1.569l-1.479,0.628l-0.807,1.3l0.546,0.687l-0.655,0.833l0.833,0.774l0.952-0.595l1.607,0.119l0.178,1.011l0.953,0.536l1.071,0.536l1.071-0.417l1.25,1.606l1.19-0.238l0.06,0.953l1.19,0.238l1.012,0.654l-0.119,1.547l0.297,0.893l-1.131,1.13l0.536,1.429l-0.595,1.012l0.536,1.071l-1.131,1.367h-1.309l-1.25,0.894l0.953,1.012l-0.417,1.19l0.833,1.071l0.773,0.595l-0.297,1.072l-0.06,1.428l0.773,1.309l3.273,0.119l1.071,0.536l1.666-0.834l0.655-1.13h1.13l0.893,0.951l3.213-0.356l0.714-0.894h1.428l0.953,1.191l1.011,0.059l1.488-0.893l1.547,0.715l1.071-0.179l1.904,0.476l1.726,0.715l0.833-0.953l1.547-0.832l-0.357-1.846l1.25-0.893l1.844,1.547l1.012-0.118l0.536,1.31l0.773,1.13l0.655-0.655l0.06-1.248l1.309-1.31l1.964,0.298l1.547-0.061l1.071,0.179l0.536-0.952l0.893,0.418l1.13-0.774l-0.059-1.249l-1.845-0.894l0.06-1.369l0.893-0.832l0.178-0.952l0.714-0.418l0.952,0.238l0.773-0.714h1.369l0.476-1.012l1.369,0.06l-0.119-1.428l0.952-0.773l1.428-0.119l-0.477-1.944l0.873-0.873L99.213,71.173zM76.799,66.65l-1.151,0.119l-0.793,0.556l0.556,0.476l0.119,1.229l-0.833,0.754l-0.953-0.635l-1.229-0.159l-0.595,0.595l-1.111,0.278l-0.634,0.913l-0.873,0.039l-0.833,0.397l-0.238,0.635l-1.071,0.238l-0.794-0.873l0.397-1.27l-1.111-0.556l0.317-0.714l-0.913-0.595l-0.714-1.031l0.555-0.833l-0.912-1.111l1.666-0.833l0.635,0.357l1.111,0.08l-0.278-1.032l0.714-0.437l0.992,0.198l1.111-0.595l0.595-0.793l1.31,0.04l0.317,0.555l0.753,0.238l0.238,0.357l0.873-0.198l-0.238,0.873l1.15,0.277l0.516,0.833h0.754l0.714,0.912L76.799,66.65z").scale(scalex,scaley,0,0).attr(attr);
     aus.kralovehradecko = r.path("M98.496,36.6l1.94,0.129l2.134,0.97l0.646,0.647l1.487,0.258l1.617-0.905l0.646,1.423l0.906,2.005h1.164l1.682-0.647l1.034,1.94l-0.13,1.229l1.617-1.164l1.1-1.099l1.939,1.358l0.972,0.064l0.322-1.422h2.651l3.299,3.233l-1.1,0.97l-0.259,1.875l-2.069,0.776l-2.975,2.328l0.258,1.294l1.683,1.939l1.422-0.711l0.809,0.808v1.002l0.921,0.921l1.182-0.146l1.357,2.393l1.875,1.487l0.324,2.393l0.673,1.381l-1.999-0.895h-0.94v1.3l-2.376,0.673l-1.257,1.255l-0.402,1.704h-2.241l-1.57,0.448l-1.008-1.009l-1.727-1.009l-0.986-0.986h-1.076v-1.57l-0.807-0.807l-1.838-0.045l-1.525,0.762l-0.784,0.785c0,0-0.749-0.262-0.829-0.292s0-1.345,0-1.345h-1.166l-1.211,1.659h-2.287l-1.255-0.718l-2.364,2.048L95.9,65.755l0.494-1.614l-1.929-1.031l0.941-1.659l-0.493-1.076l0.27-1.345l-0.314-1.435l-0.717-0.717l-1.3,0.852l-2.107-0.27v-1.255l-1.144-1.144L88.1,54.77l-0.314-1.121l1.143-1.144l-0.695-1.905l0.404-1.121l-0.672-1.076l0.582-0.897l1.883,1.211l1.704-1.121l2.601,0.897l0.762,1.166l1.166-0.673v-1.21l1.39-0.896l1.077,1.076c0,0,2.262-0.468,2.286-0.493c0.022-0.026,0-0.852,0-0.852l-1.346-1.345l0.718-1.435l-0.896-0.896l0.358-0.986l-0.763-1.838l0.449-1.883L98.496,36.6z").scale(scalex,scaley,0,0).attr(attr);
     
     var current = null;
     for (var state in aus) {
          aus[state].color = Raphael.getColor();
          (function (st, state) {
               st[0].active = 0;
               st[0].style.cursor = "pointer";
               st[0].onmouseover = function () {
                    current && aus[current].animate({
                         fill: "#fff", 
                         stroke: "#222", 
                         'stroke-width': 1
                    }, 500);// && (document.getElementById(current).style.display = "");
                    st.animate({
                         fill: st.color, 
                         stroke: "#222", 
                         'stroke-width': 1
                    }, 500);
                    st.toFront();
                    r.safari();
                    //document.getElementById(state).style.display = "block";
                    current = state;
               };
               st[0].onmouseout = function () {
                    st.animate({
                         fill: "#fff", 
                         stroke: "#222", 
                         'stroke-width': 1
                    }, 500);
                    st.toFront();
                    r.safari();
               };

               st[0].onclick = function (event) {
                    window.location.href=state;
               };
               if (state == "praha") {
                    st[0].onmouseover();
               }
          })(aus[state], state);
     }

     /*var c = $('#crmap').html();*/
     /*$('#crmap').empty();*/
     /*return c;*/
}

function initEvents(){
     // hover
     $('#calendar td').hover(function(){
          if($(this).hasClass('day')) $(this).addClass('hover');
     },function(){
          $(this).removeClass('hover');
     });
     // poper
     $('#calendar .haveevents').each(function(){
          var title = $(this).attr('data-day');
          var manual = false;
          $(this).popover({
               title: title,
               trigger: 'manual',
               placement: 'left',
               container: 'body',
               html: true,
               content: function(){
                    var list = '<ul class="popevents">';
                    $('i',$(this)).each(function(index,obj){
                         list += '<li>';
                              list += '<i class="event-icon event-type-'+$(obj).attr('data-type')+'"></i><strong>'+$(obj).attr('data-title')+'</strong><br>';
                              list += '<div class="info"><strong>Čas:</strong> '+$(obj).attr('data-time')+', <strong>Místo:</strong> '+$(obj).attr('data-place')+'</div>';
                              list += $(obj).attr('data-description');
                         list += '</li>';
                    });
                    return list+'</ul>';
               }
          });
          $(this).click(function(e){
               manual = !manual;
               e.stopPropagation();
          });
          $(this).mouseenter(function(){
               if(!manual) $(this).popover('show');
          });
          $(this).mouseleave(function(){
               if(!manual) $(this).popover('hide');
          });
          $(document).click(function(){
               manual = false;
               $('#calendar .haveevents').each(function(){ $(this).popover('hide'); });
          });
     });

     // filtr
     //var fstatus = false;
     $('a[href="#filter-events"]').click(function(){
          $('#filter').slideToggle();
     });
}

function initTz(){
     $('.carousel').carousel('cycle');
}

function initYoutube(){

     initPirateVideos = function(json){
          for(var i=0;i<json.data.items.length;i++){
               var item = json.data.items[i];
               var minutes = Math.floor(parseInt(item.duration)/60);
               var seconds = parseInt(item.duration)-minutes*60;
               jQuery("#youtube ul").append('<li><div class="time">'+minutes+':'+seconds+'</div><a href="'+item.player["default"]+'"><img src="'+(item.thumbnail.sqDefault).replace('http','https')+'" alt="'+item.title+'" title="'+item.description+'" /></a><br /><a href="'+item.player["default"]+'" title="'+item.description+'">'+item.title+'</a></li>');
          }
     }

     $('<script></script>').attr('type', 'text/javascript').attr('src', 'https://gdata.youtube.com/feeds/api/users/CeskaPiratskaStrana/uploads?v=2&alt=jsonc&prettyprint=true&max-results=3&callback=initPirateVideos').appendTo(jQuery('head'));

}

/*
<h2>Pirátská strana vyzvala prezidenta ke zveřejnění dokumentů o amnestii</h2>
<div class="tztxtblock"></div>
*/
