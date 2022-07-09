<div class="details-section__inner-wrap">
    <section class="details-section__details details">
        <div class="details__header-wrap hide-mobile"><h3 class="details__header">Описание</h3></div>
        <div class="details__content collapsable"
             data-link="{collapsibleBlock btnClass='j-wba-card-item j-wba-card-item-show j-description-btn' nameForWba='Item_Description_More' itemSelector='.j-description' maxCollapsedHeight=80 collapsedMsg='Развернуть описание' unCollapsedMsg='Свернуть описание'}class{merge: !product^description toggle='hide'}"
             data-jsv="#5548^/5548^">
            <div class="collapsable__content j-description" style="max-height: 80px;">
                <p class="collapsable__text" data-link="text{:product^description}">{{$product->description}}</p>
            </div>
            <div class="collapsible__bottom">
                <div class="collapsible__toggle-wrap description">
                    <button
                        class="collapsible__toggle j-wba-card-item j-wba-card-item-show j-description-btn"
                        data-name-for-wba="Item_Description_More"
                        data-link="text{:isCollapsed ? collapsedMsg : unCollapsedMsg}{on toggleCollapse !isCollapsed}"
                        type="button" data-jsv="#5749^/5749^">Развернуть описание
                    </button>
                </div>
            </div>
        </div>
        <p class="details__empty hide-mobile hide"
           data-link="class{merge: product^description toggle='hide'}">Описания пока нет. Возможно, оно появится тут позже</p>
    </section>

    <section class="details-section__details details-section__details--consist details hide"
         data-link="class{merge: !product^consist toggle='hide'}{collapsibleBlock itemSelector='.j-consist' maxCollapsedHeight=40 collapsedMsg='Развернуть состав' unCollapsedMsg='Свернуть состав'}"
         data-jsv="#5553^/5553^"><h3 class="details__header">Состав</h3>
        <div class="details__content collapsable">
            <div class="collapsable__content j-consist" data-link="text{:product^consist}" style="max-height: 40px;"></div>
            <div class="collapsible__bottom"></div>
        </div>
    </section>

    <section class="details-section__details details hide"
             data-link="class{merge: !product^discountReason toggle='hide'}{collapsibleBlock itemSelector='.j-discount' maxCollapsedHeight=40 collapsedMsg='Развернуть причину уценки' unCollapsedMsg='Свернуть причину уценки'}"
             data-jsv="#5556^/5556^">
        <h3 class="details__header">Причина уценки</h3>
        <div class="details__content collapsable">
            <div class="collapsable__content j-discount" style="max-height: 40px;"><p
                    class="collapsable__text" data-link="text{:product^discountReason}"></p></div>
            <div class="collapsible__bottom">
            </div>
        </div>
    </section>
</div>
