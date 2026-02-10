<?php
/*
Template Name: Calculator Page Template
*/
get_header(); 
?>

<style>
    /* Estilos personalizados para la calculadora */
    input[type="range"] {
        -webkit-appearance: none;
        appearance: none;
        width: 100%;
        height: 8px;
        background: #e5e7eb; /* Color de la pista (track) */
        border-radius: 5px;
        outline: none;
        opacity: 0.7;
        transition: opacity .2s;
    }
    input[type="range"]:hover { opacity: 1; }
    input[type="range"]::-webkit-slider-thumb {
        -webkit-appearance: none; appearance: none; width: 20px; height: 20px;
        background: #7c3aed; border-radius: 50%; border: 2px solid white;
        box-shadow: 0 0 5px rgba(0,0,0,0.2); cursor: pointer;
    }
    input[type="range"]::-moz-range-thumb {
        width: 20px; height: 20px; background: #7c3aed; cursor: pointer;
        border-radius: 50%; border: 2px solid white; box-shadow: 0 0 5px rgba(0,0,0,0.2);
    }
    .tooltip { position: relative; display: inline-block; }
    .tooltip .tooltiptext {
        visibility: hidden; width: 220px; background-color: #334155; color: #fff;
        text-align: center; border-radius: 6px; padding: 8px; position: absolute;
        z-index: 1; bottom: 125%; left: 50%; margin-left: -110px; opacity: 0;
        transition: opacity 0.3s; font-size: 0.8rem; font-weight: 400;
    }
    .tooltip .tooltiptext::after {
        content: ""; position: absolute; top: 100%; left: 50%; margin-left: -5px;
        border-width: 5px; border-style: solid; border-color: #334155 transparent transparent transparent;
    }
    .tooltip:hover .tooltiptext { visibility: visible; opacity: 1; }
    .campaign-toggle { display: flex; border: 1px solid #d1d5db; border-radius: 0.5rem; overflow: hidden; }
    .campaign-toggle input { display: none; }
    .campaign-toggle label {
        flex: 1; padding: 0.5rem 1rem; text-align: center; cursor: pointer;
        transition: background-color 0.2s, color 0.2s; color: #4b5563;
    }
    .campaign-toggle input:checked + label { background-color: #7c3aed; color: white; font-weight: 600; }
</style>

<main>
    <!-- Page Header -->
    <section class="bg-gray-100 pt-32 pb-16 md:pt-40 md:pb-24">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-[#481262]"><?php the_field('calculator_page_title'); ?></h1>
            <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-700"><?php the_field('calculator_page_subtitle'); ?></p>
        </div>
    </section>

    <!-- Calculator Section -->
    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="w-full max-w-7xl bg-white rounded-2xl shadow-lg p-8 grid grid-cols-1 md:grid-cols-2 gap-8 mx-auto">
        
                <!-- Columna de Inputs -->
                <div class="flex flex-col space-y-4">
                    <header>
                        <h1 class="text-2xl font-bold text-gray-800">Crea un nuevo escenario</h1>
                        <p class="text-gray-500 mt-1">Y saca el mejor provecho de tus campañas</p>
                    </header>
                    
                    <div>
                        <button id="load-defaults-btn" class="w-full text-sm font-semibold py-2 px-4 bg-violet-100 text-violet-700 rounded-lg hover:bg-violet-200 transition-colors flex items-center justify-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lightbulb" viewBox="0 0 16 16">
                              <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13a.5.5 0 0 1 0 1 .5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1 0-1 .5.5 0 0 1 0-1 .5.5 0 0 1-.46-.302l-.761-1.77a1.964 1.964 0 0 0-.453-.618A6 6 0 0 1 2 6zm6 8.5a.5.5 0 0 0 .5-.5h-1a.5.5 0 0 0 .5.5zM8 1a5 5 0 0 0-3.466 8.657c.362.33.69.752.924 1.224l.043.1c.062.145.122.29.178.434h3.594c.056-.144.116-.29.178-.434l.043-.1c.234-.472.562-.894.924-1.224A5 5 0 0 0 8 1z"/>
                            </svg>
                            <span>Cargar Datos de Ejemplo</span>
                        </button>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-600 mb-1 block">Tipo de Campaña</label>
                        <div class="campaign-toggle">
                            <input type="radio" id="typeWeb" name="campaignType" value="web" checked>
                            <label for="typeWeb">Sitio Web</label>
                            <input type="radio" id="typeMsg" name="campaignType" value="messaging">
                            <label for="typeMsg">Mensajería (WA/DM)</label>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between items-center mb-1">
                                <label for="targetRevenue" class="text-sm font-medium text-gray-600 flex items-center">
                                    ¿Cuánto quieres facturar?
                                    <div class="tooltip ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle text-gray-400" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/></svg><span class="tooltiptext">Ingresa el objetivo total de ingresos que deseas alcanzar con tu campaña.</span></div>
                                </label>
                                <input type="number" id="revenueValue" value="10000" step="100" min="100" max="100000" class="w-24 text-right font-semibold text-violet-600 bg-gray-100 rounded-md p-1 border-transparent focus:ring-violet-500 focus:border-violet-500 focus:bg-white transition">
                            </div>
                            <input type="range" id="targetRevenue" min="100" max="100000" value="10000" step="100" class="w-full">
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="currency" class="text-sm font-medium text-gray-600">Moneda</label>
                                <select id="currency" class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-violet-500 focus:border-violet-500">
                                    <option value="USD" selected>$ (USD)</option>
                                    <option value="EUR">€ (EUR)</option>
                                    <option value="MXN">$ (MXN)</option>
                                    <option value="COP">$ (COP)</option>
                                </select>
                            </div>
                            <div>
                                <label for="avgTicketPrice" class="text-sm font-medium text-gray-600 flex items-center">
                                    Ticket promedio
                                     <div class="tooltip ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle text-gray-400" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/></svg><span class="tooltiptext">¿Cuál es el valor promedio de cada venta que realizas?</span></div>
                                </label>
                                <input type="number" id="avgTicketPrice" class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-violet-500 focus:border-violet-500" placeholder="497">
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4 pt-4">
                        <div id="roas-container" class="p-2 -mx-2 rounded-lg transition-colors duration-300">
                            <div class="flex justify-between items-center mb-1">
                                <label for="targetRoas" class="text-sm font-medium text-gray-600 flex items-center">ROAS a conseguir <div class="tooltip ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle text-gray-400" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/></svg><span class="tooltiptext">Return On Ad Spend. ¿Cuántos dólares quieres ganar por cada dólar invertido?</span></div></label>
                                <input type="number" id="roasValue" value="5" step="0.5" min="1" max="20" class="w-20 text-right font-semibold text-violet-600 bg-gray-100 rounded-md p-1 border-transparent focus:ring-violet-500 focus:border-violet-500 focus:bg-white transition">
                            </div>
                            <input type="range" id="targetRoas" min="1" max="20" value="5" step="0.5" class="w-full">
                        </div>
                        <div id="cvr-container">
                            <div class="flex justify-between items-center mb-1">
                                <label for="conversionRate" class="text-sm font-medium text-gray-600 flex items-center">
                                    <span id="cvrLabel">Conversion rate CVR (%)</span>
                                    <div class="tooltip ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle text-gray-400" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/></svg><span id="cvrTooltip" class="tooltiptext">Porcentaje de visitantes a tu web que terminan comprando.</span></div>
                                </label>
                                <div class="flex items-center space-x-2">
                                    <input type="number" id="cvrValue" value="5.0" step="0.1" min="0.1" max="10" class="w-20 text-right font-semibold text-violet-600 bg-gray-100 rounded-md p-1 border-transparent focus:ring-violet-500 focus:border-violet-500 focus:bg-white transition">
                                    <span class="text-violet-600 font-semibold">%</span>
                                </div>
                            </div>
                            <input type="range" id="conversionRate" min="0.1" max="10" value="5" step="0.1" class="w-full">
                        </div>
                         <div>
                            <div class="flex justify-between items-center mb-1">
                                <label for="ctr" class="text-sm font-medium text-gray-600 flex items-center">CTR de la campaña (%) <div class="tooltip ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle text-gray-400" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/></svg><span class="tooltiptext">Click-Through Rate. Porcentaje de personas que ven tu anuncio y hacen clic en él.</span></div></label>
                                <div class="flex items-center space-x-2">
                                   <input type="number" id="ctrValue" value="2.0" step="0.1" min="0.1" max="15" class="w-20 text-right font-semibold text-violet-600 bg-gray-100 rounded-md p-1 border-transparent focus:ring-violet-500 focus:border-violet-500 focus:bg-white transition">
                                   <span class="text-violet-600 font-semibold">%</span>
                                </div>
                            </div>
                            <input type="range" id="ctr" min="0.1" max="15" value="2" step="0.1" class="w-full">
                        </div>
                         <div id="cpc-container" class="p-2 -mx-2 rounded-lg transition-colors duration-300">
                            <div class="flex justify-between items-center mb-1">
                                <label for="expectedCpc" class="text-sm font-medium text-gray-600 flex items-center">CPC esperado <div class="tooltip ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle text-gray-400" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/></svg><span class="tooltiptext">¿Cuánto estás dispuesto a pagar por cada clic en tu anuncio?</span></div></label>
                                <input type="number" id="cpcValue" value="1.5" step="0.05" min="0.1" max="10" class="w-20 text-right font-semibold text-violet-600 bg-gray-100 rounded-md p-1 border-transparent focus:ring-violet-500 focus:border-violet-500 focus:bg-white transition">
                            </div>
                            <input type="range" id="expectedCpc" min="0.1" max="10" value="1.5" step="0.05" class="w-full">
                        </div>
                    </div>
                </div>
                
                <!-- Columna de Resultados -->
                <div class="bg-violet-900 rounded-xl p-8 flex flex-col justify-center text-white">
                     <h2 class="text-2xl font-bold mb-6">Resultados del escenario</h2>
                     
                     <div id="results" class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="p-4 bg-violet-600/30 rounded-lg"><p class="text-sm text-violet-200">Inversión por ROAS</p><p id="investmentByRoas" class="text-2xl font-bold">--</p></div>
                            <div class="p-4 bg-violet-600/30 rounded-lg"><p class="text-sm text-violet-200">Inversión por CPC</p><p id="investmentByCpc" class="text-2xl font-bold">--</p></div>
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="p-4 bg-violet-600/30 rounded-lg"><p class="text-sm text-violet-200">Ventas Necesarias</p><p id="salesNeeded" class="text-xl font-semibold">--</p></div>
                            <div class="p-4 bg-violet-600/30 rounded-lg"><p class="text-sm text-violet-200">Coste por Venta (CPA)</p><p id="cpa" class="text-xl font-semibold">--</p></div>
                        </div>

                        <div class="p-4 bg-violet-600/30 rounded-lg">
                            <p id="leadsLabel" class="text-sm text-violet-200">Visitantes a la web necesarios</p>
                            <p id="leadsNeeded" class="text-xl font-semibold">--</p>
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                             <div class="p-4 bg-violet-600/30 rounded-lg"><p id="clicksLabel" class="text-sm text-violet-200">Clics en el anuncio</p><p id="clicksNeeded" class="text-xl font-semibold">--</p></div>
                             <div class="p-4 bg-violet-600/30 rounded-lg"><p class="text-sm text-violet-200">Impresiones necesarias</p><p id="impressionsNeeded" class="text-xl font-semibold">--</p></div>
                        </div>

                     </div>
                     <div class="mt-4 p-4 bg-violet-500/50 rounded-lg">
                         <p class="text-sm text-violet-200 text-center">Promedio de Inversión Sugerida</p>
                         <p id="avgInvestment" class="text-3xl font-bold text-center mt-1">--</p>
                     </div>
                     <p id="errorMessage" class="text-center text-amber-300 mt-4 font-medium hidden"></p>
                </div>

            </div>
        </div>
    </section>
</main>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const campaignTypeInputs = document.querySelectorAll('input[name="campaignType"]');
        const loadDefaultsBtn = document.getElementById('load-defaults-btn');
        const targetRevenueEl = document.getElementById('targetRevenue');
        const revenueValueEl = document.getElementById('revenueValue');
        const currencyEl = document.getElementById('currency');
        const avgTicketPriceEl = document.getElementById('avgTicketPrice');
        const targetRoasEl = document.getElementById('targetRoas');
        const roasValueEl = document.getElementById('roasValue');
        const conversionRateEl = document.getElementById('conversionRate');
        const cvrValueEl = document.getElementById('cvrValue');
        const ctrEl = document.getElementById('ctr');
        const ctrValueEl = document.getElementById('ctrValue');
        const expectedCpcEl = document.getElementById('expectedCpc');
        const cpcValueEl = document.getElementById('cpcValue');
        
        const cvrLabelEl = document.getElementById('cvrLabel');
        const cvrTooltipEl = document.getElementById('cvrTooltip');
        const leadsLabelEl = document.getElementById('leadsLabel');
        const clicksLabelEl = document.getElementById('clicksLabel');

        const roasContainer = document.getElementById('roas-container');
        const cpcContainer = document.getElementById('cpc-container');

        const investmentByRoasEl = document.getElementById('investmentByRoas');
        const investmentByCpcEl = document.getElementById('investmentByCpc');
        const avgInvestmentEl = document.getElementById('avgInvestment');
        const salesNeededEl = document.getElementById('salesNeeded');
        const cpaEl = document.getElementById('cpa');
        const leadsNeededEl = document.getElementById('leadsNeeded');
        const clicksNeededEl = document.getElementById('clicksNeeded');
        const impressionsNeededEl = document.getElementById('impressionsNeeded');
        const errorMessageEl = document.getElementById('errorMessage');

        function loadExampleData() {
            const exampleROAS = 3;
            const exampleCTR = 1.5;
            const exampleCPC = 0.80;
            const selectedType = document.querySelector('input[name="campaignType"]:checked').value;
            const exampleCVR = selectedType === 'messaging' ? 8 : 1.5;
            
            roasValueEl.value = exampleROAS;
            cvrValueEl.value = exampleCVR;
            ctrValueEl.value = exampleCTR;
            cpcValueEl.value = exampleCPC;
            
            targetRoasEl.value = exampleROAS;
            conversionRateEl.value = exampleCVR;
            ctrEl.value = exampleCTR;
            expectedCpcEl.value = exampleCPC;
            
            calculate();
        }

        function updateUIForCampaignType() {
            const selectedType = document.querySelector('input[name="campaignType"]:checked').value;
            
            if (selectedType === 'messaging') {
                cvrLabelEl.textContent = 'Tasa de Cierre en Chat (%)';
                cvrTooltipEl.textContent = 'De todas las conversaciones que inicias, ¿qué porcentaje termina en una venta?';
                leadsLabelEl.textContent = 'Conversaciones a Iniciar';
                clicksLabelEl.textContent = 'Clics para Mensaje';
            } else { // web
                cvrLabelEl.textContent = 'Conversion rate CVR (%)';
                cvrTooltipEl.textContent = 'Porcentaje de visitantes a tu web que terminan comprando.';
                leadsLabelEl.textContent = 'Visitantes a la web necesarios';
                clicksLabelEl.textContent = 'Clics en el anuncio';
            }
            calculate();
        }

        function calculate() {
            roasContainer.classList.remove('bg-red-100');
            cpcContainer.classList.remove('bg-red-100');

            const targetRevenue = parseFloat(revenueValueEl.value) || 0;
            const avgTicketPrice = parseFloat(avgTicketPriceEl.value) || 0;
            const targetRoas = parseFloat(roasValueEl.value) || 0;
            const conversionRate = parseFloat(cvrValueEl.value) || 0;
            const ctr = parseFloat(ctrValueEl.value) || 0;
            const expectedCpc = parseFloat(cpcValueEl.value) || 0;
            const currency = currencyEl.options[currencyEl.selectedIndex].text.split(' ')[0];

            if (targetRevenue <= 0 || avgTicketPrice <= 0 || targetRoas <= 0 || conversionRate <= 0 || ctr <= 0 || expectedCpc <= 0) {
                errorMessageEl.textContent = "Por favor, completa todos los campos con valores positivos.";
                errorMessageEl.classList.remove('hidden');
                resetResults();
                return;
            }
            
            const investmentByRoas = targetRevenue / targetRoas;
            const salesNeeded = targetRevenue / avgTicketPrice;
            const cpa = investmentByRoas / salesNeeded;
            
            const leadsNeeded = salesNeeded / (conversionRate / 100);
            const clicksNeeded = leadsNeeded; 
            const impressionsNeeded = clicksNeeded / (ctr / 100);
            
            const investmentByCpc = clicksNeeded * expectedCpc;
            const avgInvestment = (investmentByRoas + investmentByCpc) / 2;

            const formatter = new Intl.NumberFormat('es-ES', {
                style: 'currency',
                currency: currencyEl.value,
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

            investmentByRoasEl.textContent = formatter.format(investmentByRoas);
            investmentByCpcEl.textContent = formatter.format(investmentByCpc);
            avgInvestmentEl.textContent = formatter.format(avgInvestment);
            salesNeededEl.textContent = Math.ceil(salesNeeded).toLocaleString('es-ES');
            cpaEl.textContent = formatter.format(cpa);
            leadsNeededEl.textContent = Math.ceil(leadsNeeded).toLocaleString('es-ES');
            clicksNeededEl.textContent = Math.ceil(clicksNeeded).toLocaleString('es-ES');
            impressionsNeededEl.textContent = Math.ceil(impressionsNeeded).toLocaleString('es-ES');

            const difference = Math.abs(investmentByRoas - investmentByCpc);
            const tolerance = investmentByRoas * 0.15;
            if (difference > tolerance) {
                errorMessageEl.textContent = "¡Atención! Tus objetivos de ROAS y CPC no son consistentes.";
                errorMessageEl.classList.remove('hidden');
                roasContainer.classList.add('bg-red-100');
                cpcContainer.classList.add('bg-red-100');
            } else {
                errorMessageEl.classList.add('hidden');
            }
        }

        function resetResults() {
             investmentByRoasEl.textContent = '--';
             investmentByCpcEl.textContent = '--';
             avgInvestmentEl.textContent = '--';
             salesNeededEl.textContent = '--';
             cpaEl.textContent = '--';
             leadsNeededEl.textContent = '--';
             clicksNeededEl.textContent = '--';
             impressionsNeededEl.textContent = '--';
        }

        function linkSliderAndNumberInput(sliderElem, numberElem) {
            sliderElem.addEventListener('input', () => numberElem.value = sliderElem.value);
            numberElem.addEventListener('input', () => sliderElem.value = sliderElem.value);
        }

        loadDefaultsBtn.addEventListener('click', loadExampleData);
        campaignTypeInputs.forEach(input => input.addEventListener('change', updateUIForCampaignType));
        linkSliderAndNumberInput(targetRevenueEl, revenueValueEl);
        linkSliderAndNumberInput(targetRoasEl, roasValueEl);
        linkSliderAndNumberInput(conversionRateEl, cvrValueEl);
        linkSliderAndNumberInput(ctrEl, ctrValueEl);
        linkSliderAndNumberInput(expectedCpcEl, cpcValueEl);
        
        const inputs = [
            targetRevenueEl, revenueValueEl, currencyEl, avgTicketPriceEl, 
            targetRoasEl, roasValueEl, conversionRateEl, cvrValueEl, 
            ctrEl, ctrValueEl, expectedCpcEl, cpcValueEl
        ];
        inputs.forEach(input => input.addEventListener('input', calculate));
        
        window.addEventListener('load', () => {
             avgTicketPriceEl.value = 150;
             updateUIForCampaignType();
             calculate();
        });
    });
</script>

<?php get_footer(); ?>

